<div class="row no-gutters align-items-center p-2 border-bottom">
  <div class="col-1">
    <a href="<?=base_url('employee');?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="col-10 d-flex align-items-center">
    <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/').$user_receiver->image?>" alt="">
    <h5 class="text-primary ml-2"><?=$user_receiver->fullname; ?></h5>
  </div>
</div>

<!-- ini box chat -->

<div class="box-chat">
  
</div>
<!-- ini box chat -->

<form action="<?=base_url('chat/chat_with/'); ?>" id="form_chat">
  <div class="form-group row no-gutters border-top">
    <div class="col-10 col-md-11">
      <input type="hidden" name="chat_root_id" id="chat_root_id" value="<?=$chat_root; ?>">
      <textarea name="chat_text" id="chat_text" class="form-control border-0" rows="5" autofocus></textarea>
    </div>
    <div class="col-2 col-md-1 d-flex text-center align-items-center">
      <button class="btn btn-primary rounded-0"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
</form>

<input type="hidden" id="key_user" value="<?=$this->session->userdata('user_id'); ?>">


<script type="text/javascript">

function playsoundreply() {
  var audio = new Audio('<?=base_url('assets/audio/__send.mp3')?>');
  audio.volume = 0.1;
  audio.play();
}



  $('#form_chat').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: $('#form_chat').attr('action'),
      type: 'POST',
      data: $('#form_chat').serialize(),
      success:function (res) {
        $('#chat_text').val('');
        playsoundreply()
      }
    })
  })

  function get_chat() {
    const chat_root_id = $('#chat_root_id').val();
    const keyUser = $('#key_user').val();
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_root_chat_id/' + chat_root_id,
      success: function (res) {
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
                      <small class="fullname d-block">saya</small>
                      <small class="time d-block">${new Date(d.time_created*1000).toLocaleString()}</small>
                    </div>
                  </div>
                `;
              }else{
                return `
                  <div class="row no-gutters justify-content-start list-comment-reporter py-2">
                    <div class="col-10 col-lg-8 comment-self px-3">
                      <span class="d-block">${d.chat_text}</span>
                      <small class="time d-block mt-2">${new Date(d.time_created*1000).toLocaleString()}</small>
                    </div>
                  </div>
                `;
              }
            })()}
            `;
          });  
          $('.box-chat').html(html);
        }
      }
    })
  }
  get_chat()
  setInterval(() => {
  get_chat()    
  }, 1000);
</script>