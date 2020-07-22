<?=$this->session->flashdata('message'); ?>
<div class="box-all-users p-2">
  <?php foreach($all_users as $user) : ?>
    <?php if($user->id != $this->session->userdata('user_id')) : ?>
    <div class="box-user" onclick='detail_emp(<?=$user->id?>)'>
        <img src="<?=base_url('assets/img/profile/').$user->image; ?>" alt="">
        <span><?=$user->fullname; ?></span>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<div id="box_char_root">
  <?php foreach ($chat_root as $cr) : ?>
    <div class="chat-by p-2" onclick='load_replay_chat(<?=$cr->chat_root_id?>)'>
      <div class="row no-gutters align-items-center">
        <div class="col-3 col-md-2">
          <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/').$cr->image?>" alt="">
        </div>
        <div class="col-6 col-md-7">
          <p><?=$cr->from ?></p>
          <small><?=$cr->position_name ?></small>
        </div>
        <div class="col-3 col-md-3 text-center">
          <small class="text-danger">
            <?php if($cr->count_chat_adm > 0) : ?>
              <?=$cr->count_chat_adm; ?> pesan belum dibaca
            <?php endif; ?>
          </small>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<div class="row no-gutters justify-content-end">
  <div class="col-6 text-right mr-2">
    <div class="list-group list-group-flush mt-3" id="getCFA">
      <?php if($get_chat_fa) : ?>
        <small><i class="fas fa-bell text-danger"></i></small>
        <?php foreach($get_chat_fa as $gcf) : ?>
      <a href="<?=base_url('chat/index/').$gcf->to_user;?>" class="list-group-item list-group-item-action p-1 d-flex justify-content-between align-items-center px-2 rounded-0">
        <small class="text-danger"><b><?=$gcf->count_chat_emp ?> balasan</b> dari <?=$gcf->replay_from_emp;?> belum dibaca</small>
      </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="news-new">
  <ul class="list-group list-group-flush">
  <li class="list-group-item py-3 d-flex justify-content-center">
    <?php $this->load->view('templates/loader'); ?>
  </li>
</ul>
</div>
<div class="list-group m-2 old-news"></div>

<!-- Modal -->
<div class="modal slideInUp" id="show_ann">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="modal_cont">
      <!-- THIS FOR CONTENT -->
    </div>
  </div>
</div>

<script type="text/javascript">
function detail_ann(detail_id) {
  $('#modal_cont').load('<?=base_url()?>home/load_detail_ann/'+detail_id,function () {
    $('#show_ann').modal('show');
  })
}


function get_new_ann() {
  $.ajax({
    url: '<?=base_url()?>home/get_new_ann/',
    success: function (result) {
      $('.news-new').html(result);
    }
  })
}

function get_old_ann() {
  $.ajax({
    url: '<?=base_url()?>home/get_old_ann/',
    success: function (result) {
      $('.old-news').html(result);
    }
  })
}

$('document').on('click','.list-ann',function () {
  const judul = $(this).data('judul');
  const isi = $(this).data('isi');
  const time = $(this).data('tanggal');
  const pembuat = $(this).data('pembuat');

  const tanggal = new Date(time * 1000).toUTCString();

  $('.modal-body .judul').html(judul)
  $('.modal-body .isi').html(isi)
  $('.modal-body .tanggal').html(tanggal)
  $('.modal-body .pembuat').html(pembuat)
})



function detail_emp(user_id) {
  window.location.href = '<?=base_url('employee/detail/')?>'+user_id;
}
function load_replay_chat(chat_root_id){
  window.location.href = '<?=base_url('chat/load_reply_chat/')?>'+chat_root_id;
}
function getChatRoot() {
  $.ajax({
    url: '<?=base_url()?>home/get_chat_root/',
    success:function(res){
      if(res){
        let html = '';
        const data = JSON.parse(res);
        data.forEach(d => {
          html += `
          <div class="chat-by p-2" onclick='load_replay_chat(${d.chat_root_id})'>
            <div class="row no-gutters align-items-center">
              <div class="col-3 col-md-2">
                <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/')?>${d.image}" alt="">
              </div>
              <div class="col-6 col-md-7">
                <p>${d.from}</p>
                <small>${d.position_name}</small>
              </div>
              <div class="col-3 col-md-3 text-center">
                <small class="text-danger">
                ${(()=>{
                  if(d.count_chat_adm > 0){
                    return `${d.count_chat_adm} pesan belum dibaca`;
                  }else{
                    return ``;
                  }
                } )()}
                </small>
              </div>
            </div>
          </div>
          `;
        });
        $('#box_char_root').html(html);
      }
    }
  })
}
function get_chat_fa(){
  $.ajax({
    url:'<?=base_url()?>home/get_chat_fa/',
    success:function (res){
      let html ='';
      if(res){
        const data = JSON.parse(res);
        data.forEach(d => {
          html += `
            <small><i class="fas fa-bell text-danger"></i></small>
            <a href='<?=base_url("chat/index/")?>${d.to_user}' class="list-group-item list-group-item-action p-1 d-flex justify-content-between align-items-center px-2 rounded-0">
              <small class="text-danger"><b>${d.count_chat_emp} balasan</b> dari ${d.replay_from_emp} belum dibaca</small>
            </a>
          `;
        });
        $('#getCFA').html(html);
      }
    }
  })
}
get_old_ann()
get_chat_fa()
getChatRoot()
get_new_ann()
setInterval(() => {
get_old_ann()
get_chat_fa()
getChatRoot()
get_new_ann()  
}, 2000);
$('document').ready(function () {
  $('.box-all-users').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }
    }
  ]
});
})
</script>