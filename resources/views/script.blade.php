<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/npm.js"></script>

<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

<script>
  // const showBtn = document.getElementById('showMoreBtn');
  // const hideBtn = document.getElementById('hideMoreBtn');

  function showMoreBtn(id, idname) {
    var repList = document.getElementById(idname);
    const showBtn = document.getElementById('btn-show-' + id);

    // console.log(id);
    repList.style.display = 'block';
    showBtn.style.display = 'none';
  }

  function hideMoreBtn(id, idname) {
    var repList = document.getElementById(idname);
    const showBtn = document.getElementById('btn-show-' + id);
    // console.log(repCmtForm);
    repList.style.display = 'none';
    showBtn.style.display = 'inline-block';
  }

  function handleClickRepComment(idname) {
    var repCmtForm = document.getElementById(idname);
    console.log(repCmtForm);
    repCmtForm.style.display = repCmtForm.style.display === 'none' ? 'block' : 'none';

  }

  function handleUpdateInfo() {
    var form = document.getElementById('update-user-info-form');
    console.log(form);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
  }
</script>