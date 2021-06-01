
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><span>Pohon</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding-small filter">
                            <form class="uk-grid-small" target="_blank" id="cetak-filter-form" method="POST" action="<?php echo base_url(); ?>pohon/cetak_filter" uk-grid>
                                <div class="uk-width-1-6@l uk-width-1-4@m">
                                    <label>Blok</labeL>
                                    <select class="uk-input select2_include" id="blok" name="blok" required>
                                        <option value="all">All</option>
                                        <?php
                                        foreach ($blok as $a) {
                                        ?>
                                            <option value="<?php echo $a->blok; ?>"><?php echo $a->blok; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="uk-width-1-6@l uk-width-1-4@m">
                                    <label>Baris</labeL>
                                    <select class="select2_include baris uk-select" id="baris" name="baris" required>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="uk-width-1-6@l uk-width-1-4@m">
                                    <label>No Pohon</labeL>
                                    <select class="select2_include no_pohon uk-select" name="no_pohon" required>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="uk-width-1-2@l uk-width-1-4@m uk-clearfix">
                                    <a href="javascript:void(0)" onclick="document.querySelector('#cetak-filter-form').submit()" class="uk-button button-success-line uk-float-right" href="<?php echo base_url(); ?>pohon/download"><span class="iconify" data-icon="heroicons-outline:qrcode" data-inline="false"></span> Cetak QR Filter</a> 
                                </div>
                            </form>
                        </div>
                        <form id="cetak-form" method="POST" action="<?php echo base_url(); ?>pohon/download">
                            <div class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                                <div class="uk-width-1-1 uk-padding uk-padding-remove-bottom uk-clearfix">
                                     <a href="javascript:void(0)" onclick="document.querySelector('#cetak-form').submit()" class="uk-button button-success-line" href="<?php echo base_url(); ?>pohon/download"><span class="iconify" data-icon="heroicons-outline:qrcode" data-inline="false"></span> Cetak QR Selection</a> 
                                    <a class="uk-button button-success-line uk-float-right" href="#modal-overflow"
                                        uk-toggle><span class="iconify" data-icon="akar-icons:plus"
                                            data-inline="false"></span>
                                        Tambah</a>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                                <div class="uk-padding-small uk-margin-remove table">
                                    <table id="data_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td><input class="uk-checkbox" type="checkbox" id="selectAll" /></td>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Blok</th>
                                                <th>Baris</th>
                                                <th>No Pohon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pohon as $a) {
                                            ?>
                                            <tr>
                                                <td><input class="uk-checkbox" name="id[]" value="<?php echo $a->id; ?>" type="checkbox"></td>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $a->kode; ?></td>
                                                <td><?php echo $a->blok; ?></td>
                                                <td><?php echo $a->baris; ?></td>
                                                <td><?php echo $a->no_pohon; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>pohon/download?id=<?php echo $a->id; ?>" class="uk-button uk-button-secondary uk-button-small"><span class="iconify" data-icon="heroicons-outline:qrcode" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pohon/edit?id=<?php echo $a->id; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="fa-solid:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pohon/info?id=<?php echo $a->id; ?>" class="uk-button uk-button-primary uk-button-small"><span class="iconify" data-icon="grommet-icons:info" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pohon/hapus?id=<?php echo $a->id; ?>"
                                                        class="uk-button uk-button-danger uk-button-small"><span
                                                            class="iconify" data-icon="bx:bxs-trash-alt"
                                                            data-inline="false"></span></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="modal-overflow" class="uk-modal-container" uk-modal>
                        <div class="uk-modal-dialog">

                            <button class="uk-modal-close-default" type="button" uk-close></button>

                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title">Tambah Pohon</h2>
                            </div>

                            <form class="uk-form-stacked" method="POST" action="<?php echo base_url(); ?>pohon/tambah_aksi">
                                <div class="uk-modal-body" uk-overflow-auto>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $id; ?>
                                            <input name="id" type="hidden" value="<?php echo $id; ?>">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">KODE</label>
                                        <div class="uk-form-controls">
                                            <span id="kode"></span>
                                            <input id="kode_input" name="kode" type="hidden" >
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">BLOK</label>
                                        <div class="uk-form-controls">
                                            <input id="blok_input" class="pohon_input uk-input field-default" name="blok"
                                                type="number" min="001" max="999" placeholder="Blok..." required>
                                                <small class="uk-text-danger">Menggunakan 3 Digit Angkat Contoh: 001</small>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">BARIS</label>
                                        <div class="uk-form-controls">
                                            <input id="baris_input" class="pohon_input uk-input field-default" name="baris"
                                                type="number" min="001" max="999" placeholder="Baris..." required>
                                                <small class="uk-text-danger">Menggunakan 3 Digit Angkat Contoh: 001</small>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">NO POHON</label>
                                        <div class="uk-form-controls">
                                            <input id="no_pohon_input" class="pohon_input uk-input field-default" name="no_pohon"
                                                type="number" min="001" max="999" placeholder="No Pohon..." required>
                                                <small class="uk-text-danger">Menggunakan 3 Digit Angkat Contoh: 001</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close"
                                        type="button">Cancel</button>
                                    <input type="submit" class="uk-button uk-button-primary" value="SAVE">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <script>           
                    $("#blok_input, #baris_input, #no_pohon_input").keyup(function () {
                        var blok_input = $('#blok_input').val();
                        var baris_input = $('#baris_input').val();
                        var no_pohon_input = $('#no_pohon_input').val();

                        var kode = blok_input+'-'+baris_input+'-'+no_pohon_input;
                        $("#kode").text(kode);
                        $("#kode_input").val(kode);
                    });
                    $(document).ready(function(){
                        $('#blok').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>pohon/get_baris",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    
                                    html += '<option value="all">All</option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option>'+data[i].baris+'</option>';
                                    }
                                    $('.baris').html(html);
                                    
                                }
                            });
                        });
                        $('#baris').change(function(){
                            var blok = $('#blok').val();
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>pohon/get_no_pohon",
                                method : "POST",
                                data : {id: id, blok: blok},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    
                                    html += '<option value="all">All</option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option>'+data[i].no_pohon+'</option>';
                                    }
                                    $('.no_pohon').html(html);
                                    
                                }
                            });
                        });
                    });
                </script>