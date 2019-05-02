$(document).ready(function(){
  $("#commentbtn").click(function(){
    $.post("postcomment.php",
    {
      txtcomment: document.getElementById('txtcomment').value,
      postid: document.getElementById('postid').value,
      commentbtn: document.getElementById('commentbtn').value
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});