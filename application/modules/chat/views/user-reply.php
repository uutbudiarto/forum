<input type="hidden" id="chat_root_id" value="<?=$chat_root_id; ?>">
<input type="hidden" id="key_user" value="<?=$this->session->userdata('user_id'); ?>">
<div class="row no-gutters p-2 border-bottom">
  <div class="col-2">
    <a href="<?=base_url('home'); ?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
</div>
<div class="box-user-reply"></div>

<form action="<?=base_url('chat/user_replay/') ?>" method="post" id="form_user_reply_chat">
<div class="box-write-replay row no-gutters border-top align-items-center">
  <input type="hidden" name="chat_root_id" value="<?=$chat_root_id; ?>">
    <div class="col-md-11 col-10">
      <textarea name="chat_text" id="chat_text" rows="3" class="form-control border-0"></textarea>
    </div>
    <div class="col-2 col-md-1">
      <button type="submit" class="btn btn-primary idSubmit rounded-0"><i class="fas fa-paper-plane"></i> </button>
    </div>
  </div>
</form>


<script type="text/javascript">

function playsoundreply() {
  var audio = new Audio('<?=base_url('assets/audio/__send.mp3')?>');
  audio.volume = 0.1;
  audio.play();
}




  $('#form_user_reply_chat').on('submit',function (e) {
    e.preventDefault();
    if($('#chat_text').val() == ''){
      alert ('Text kosong')
    }else{
      $.ajax({
        url: $('#form_user_reply_chat').attr('action'),
        type:'POST',
        data: $('#form_user_reply_chat').serialize(),
        success:function(res){
          $('#chat_text').val('');
          get_chat();
          playsoundreply()
        }
      })
    }
  })
  function get_chat(){
    const chat_root_id = $('#chat_root_id').val();
    const keyUser = $('#key_user').val();    
    $.ajax({
      url : '<?=base_url()?>chat/get_reply_chat/'+chat_root_id,
      success:function (res) {
        let html = '';
        if (res) {
          const data = JSON.parse(res);         
          data.forEach(d => {
            html += `
              ${(() => {
                if(d.user_id == keyUser){
                  return `
                  <div class="list-comment-commentator row no-gutters justify-content-end py-2">
                    <div class="col-10 col-lg-8 comment-other px-3">
                      <span class="d-block">${d.chat_text}</span>
                      <small class="fullname d-block">${d.fullname}</small>
                      <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
                    </div>
                  </div>
                  `;
                }else{
                  return `
                  <div class="row no-gutters justify-content-start list-comment-reporter py-2">
                    <div class="col-10 col-lg-8 comment-self px-3">
                      <span class="d-block">${d.chat_text}</span>
                      <small class="fullname">${d.fullname}</small>
                      <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
                    </div>
                  </div>
                  `;
                }
              })()}
            `;
          });
          $('.box-user-reply').html(html);
        }
      }
    })
  }
  get_chat();
  setInterval(() => {
  get_chat();    
  }, 1000);
</script>