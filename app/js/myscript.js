/* เพิ่ม ร้านที่เลือก เข้าไปใน session */
function addCompare(id) {
    $.ajax({
      url: 'http://localhost/beauty/app/index.php?r=Shop/SelectCompare',
      data: {
        id: id,
      },
      success: function(data) {
        $('#btnCP' + id).removeClass('btn-primary').addClass('btn-danger');
        $('#btnCP' + id).html('ยกเลิก');
        $('#btnCP' + id).attr('onclick', 'delCompare('+ id +')');
        showCompare();
      }
    });  
}

/* แสดง ร้านที่เลือก จาก session */
function showCompare() {
    $.ajax({
      url: 'http://localhost/beauty/app/index.php?r=Shop/ShowCompare',
      dataType: 'JSON',
      success: function(data) {
        if(data != null) {
            var length = data.length;
            var msg = '';

            if(length < 2) {
              $('#menuCompare').hide();
            }else{
              $('#menuCompare').show();
              $('#selectTotal').html(length);
            }            
        }else{
          $('#menuCompare').hide();
        }
      }
    });  
}

/* ลบ ร้านที่เลือก เข้าไปใน session */
function delCompare(id) {
    $.ajax({
      url: 'http://localhost/beauty/app/index.php?r=Shop/delSession',
      data: {
        id: id,
      },
      success: function(data) {
        $('#btnCP' + id).removeClass('btn-danger').addClass('btn-primary');
        $('#btnCP' + id).html('เปรียบเทียบ');
        $('#btnCP' + id).attr('onclick', 'addCompare('+ id +')');
        showCompare();
      }
    });  
}