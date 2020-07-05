<div class="media align-items-center chat_root_hist slideInUp border-bottom">
  <img class="rounded-circle shadow-sm mx-2" width="50" height="50" src="<?=base_url('assets/img/profile/').$chat_root->image ?>">
  <div class="media-body pl-2 py-2">
    <h6 class="mt-0"><?=$chat_root->fullname; ?></h6>
    <small class="text-secondary"><?=$chat_root->position_name ?></small>
    <input type="hidden" name="chat_root_id" id="chat_root_id" value="<?=$chat_root->chat_root_id;?>">
    <input type="hidden" id="key_user" value="<?=$this->session->userdata('user_id'); ?>">
  </div>
  <div class="pr-2">
    <button class="btn btn-sm btn-primary ml-1" id="chatAll">All</button>
    <a href='' class="btn btn-sm btn-primary ml-1"><i class="fas fa-sync-alt"></i></a>
    <button class="btn btn-sm btn-danger ml-1" id="clearChat"><i class="fas fa-trash-alt"></i></button>
  </div>
</div>
<?php $life_time = time() - (60 * 60 * 24); ?>
<input type="hidden" id="life_time" value="<?=$life_time;?>">
<div class="row ro-gutters justify-content-end mt-2">
  <div class="col-6 col-md-4">
    <input type="date" class="form-control form-control-sm bg-primary text-white" value="<?=date('Y-m-d');?>" id="filterDate">
  </div>
</div>

<div class="box-chat mt-2" id="box-chat"></div>

<form action="<?=base_url('chat/chat_with/'); ?>" method="post" id="form_chat">
  <div class="form-group row no-gutters">
    <div class="col-10 col-md-11">
      <input type="hidden" name="chat_root_id" id="chat_root_id" value="<?=$chat_root->chat_root_id;?>">
      <textarea name="chat_text" id="chat_text" class="form-control border-0" rows="5" placeholder="balas.." autofocus></textarea>
    </div>
    <div class="col-2 col-md-1 d-flex text-center align-items-center">
      <button class="btn btn-primary rounded-0"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
</form>

<div class="modal pulse" id="modal_conf">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content" style="border: 2px solid #100;">
      
    </div>
  </div>
</div>


<script type='text/javascript'>
function playsoundreply() {
  var audio = new Audio('<?=base_url('assets/audio/__send.mp3')?>');
  audio.volume = 0.1;
  audio.play();
}
  $('document').ready(function () {
    get_chat_by_root()
  })

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

  // DEFAULT
  function get_chat_by_root() {
    const root = $('#chat_root_id').val();
    const keyUser = $('#key_user').val();
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_root_chat_id/'+root,
      success: function (res) {
        let html = '';
        if (res) {
          const data = JSON.parse(res);
          data.forEach(d => {
            if(d.time_created > $('#life_time').val()){
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
            }
          });
          $('#box-chat').html(html);
        }
      }
    })
  }
  function get_all_chat_by_root() {
    const root = $('#chat_root_id').val();
    const keyUser = $('#key_user').val();
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_root_chat_id/'+root,
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
          $('#box-chat').html(html);
        }
      }
    })
  }
  $('#chatAll').on('click',function () {
    clearInterval(myInt);
    get_all_chat_by_root();
  })

  function filter_date() {
    $('#box-chat').html('');
    const keyUser = $('#key_user').val();
    const data = {
      'date' : $('#filterDate').val(),
      'root' : $('#chat_root_id').val()
    }
    $.ajax({
      url: '<?=base_url()?>chat/get_chat_by_filter_date/',
      type:'POST',
      data : data,
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
          $('#box-chat').html(html);
        }
      }
    })
  }

  $('#filterDate').on('change',function () {
    filter_date();
    clearInterval(myInt);
  })


  $('#clearChat').on('click',function () {
    const root = $('#chat_root_id').val();
    $('.modal-content').load('<?=base_url()?>chat/load_confirm/'+root,function () {
      $('#modal_conf').modal('show');
    })
  })



  let myInt = setInterval(() => {
    get_chat_by_root()
  }, 1000);

</script>