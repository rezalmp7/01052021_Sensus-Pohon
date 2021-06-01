
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><span>Pohon</span></li>
                                </ul>
                            </div>
                            <div class="uk-width-1-1 uk-padding-small filter">
                                <form class="uk-grid-small" target="_blank" method="POST" action="<?php echo base_url(); ?>laporan/cetak" uk-grid>
                                    <div class="uk-width-1-3@l uk-width-1-2@m">
                                        <lable>Tanggal</lable>
                                        <div class="uk-margin-remove uk-button-remove" uk-grid>
                                            <div class="uk-width-expand uk-padding-small uk-padding-remove-vertical uk-padding-remove-left">
                                                <input class="uk-input" type="date" name="date_first" required>
                                            </div>
                                            <div class="uk-width-expand uk-padding-small uk-padding-remove-vertical uk-padding-remove-left">
                                                <input class="uk-input" type="date" name="date_second" required>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="uk-width-1-6@l uk-width-1-4@m">
                                        <button type="submit" class="uk-float-right uk-button button-uk-success">Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                            <div class="uk-padding-small uk-margin-remove table uk-overflow-auto">
                                <table id="data_table" class="uk-table uk-table-hover uk-table-striped"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kode</th>
                                            <th>Jumlah Buah</th>
                                            <th>Buah Rusak</th>
                                            <th>Buah Siap Panen</th>
                                            <th>Sisa Buah</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($laporan as $b) {
                                        ?>
                                        <tr>
                                            <td><?php echo date('d F Y', strtotime($b->create_at)); ?></td>
                                            <td><?php echo $b->kode_pohon; ?></td>
                                            <td><?php echo $b->jml_buah; ?></td>
                                            <td><?php echo $b->buah_rusak; ?></td>
                                            <td><?php echo $b->buah_sp_pn; ?></td>
                                            <td><?php echo $b->sisa; ?></td>
                                            <td><img style="width:70px;" src="<?php echo base_url(); ?>assets/img/laporan/<?php echo $b->foto; ?>"></td>
                                            <td>
                                                <?php
                                                if($b->status == 'benar')
                                                {
                                                ?>
                                                <span class="uk-text-success"><span class="iconify" data-icon="ant-design:check-circle-filled" data-inline="false"></span> Benar</span>
                                                <?php
                                                }
                                                if($b->status == 'salah')
                                                {
                                                ?>
                                                <span class="uk-text-danger"><span class="iconify" data-icon="ant-design:close-circle-filled" data-inline="false"></span> Salah</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>laporan/info?id=<?php echo $b->id; ?>"
                                                    class="uk-button uk-button-primary uk-button-small"><span
                                                        class="iconify" data-icon="grommet-icons:info"
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
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#blok').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>laporan/get_baris",
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