      <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg1">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"> Tambah Fasa</h5>
                <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist">
                    <li class="nav-item ml-md-3">
                        <a class="active" data-toggle="tab" href="#" data-target="#tab1pp" role="tab" onclick=""><span>(1)
                        Maklumat Pendaftaran Projek</span></a>
                    </li>
                   <!--  <li class="nav-item">
                        <a class="" data-toggle="tab" href="#" data-target="#tab2pe" role="tab" onclick=""><span>(2)Maklumat Pendaftaran EO & EMC</span></a>
                    </li> -->
                    
                    
                </ul>
                
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab1pp">
                        @include('form.daftarFasa')
                    </div>
                  <!--   <div class="tab-pane disable" id="tab2pe">
                        @include('form.penukaran')
                    </div>
 -->
                    

                </div>

            </div>
            
        </div>
        
    </div>
    
    
    <div>

    </div>
    
</div>