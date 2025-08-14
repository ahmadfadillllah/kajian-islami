<script>
  ClassicEditor
    .create(document.querySelector('#editor'), {
      toolbar: [
        'undo', 'redo', '|',
        'heading', '|',
        'bold', 'italic', 'underline', 'strikethrough', '|',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
        'alignment', '|',
        'numberedList', 'bulletedList', '|',
        'link', 'blockQuote', '|',
        'insertTable', 'tableColumn', 'tableRow', 'mergeTableCells', '|',
        'outdent', 'indent', '|',
        'code', 'codeBlock', '|',
        'horizontalLine', 'removeFormat'
      ],
      table: {
        contentToolbar: [
          'tableColumn',
          'tableRow',
          'mergeTableCells'
        ]
      }
    })
    .catch(error => {
      console.error('Editor gagal dimuat:', error);
    });
</script>
