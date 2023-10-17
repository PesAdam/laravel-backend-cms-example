<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  let editorContent = '';
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    setup: function (editor) {
    editor.on('init', function () {
      const content = editor.getContent();
      const parser = new DOMParser();
      const doc = parser.parseFromString(content, 'text/html');
      const headings = doc.querySelectorAll('h1');

      for (let i = 0; i < headings.length; i++) {
        const heading = headings[i];
        const wrapper = document.createElement('div');
        const content = document.createDocumentFragment();

        let sibling = heading.nextSibling;
        while (sibling && sibling.nodeName !== 'H1') {
          const nextSibling = sibling.nextSibling;
          content.appendChild(sibling);
          sibling = nextSibling;
        }
        wrapper.appendChild(heading.cloneNode(true));
        wrapper.appendChild(content);
        heading.parentNode.replaceChild(wrapper, heading);
      }
      editor.setContent(doc.body.innerHTML);
    });
    editor.on('change', function () {
      editorContent = editor.getContent();
    });
  }
});


</script> 