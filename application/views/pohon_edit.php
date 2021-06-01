
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div
                            class="uk-width-1-1 uk-child-width-1-3 uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top heading">
                            <div class="uk-width-1-1 uk-padding uk-padding-remove-vertical uk-margin-remove">
                                <ul class="uk-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                    <li><a href="<?php echo base_url(); ?>pohon">Pohon</a></li>
                                    <li><span>Edit</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-padding uk-margin-remove" uk-grid>
                            <form class="uk-form-stacked" method="POST" action="<?php echo base_url(); ?>pohon/edit_aksi">
                                <div class="uk-modal-body" uk-overflow-auto>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $pohon->id; ?>
                                            <input name="id" type="hidden" value="<?php echo $pohon->id; ?>">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">KODE</label>
                                        <div class="uk-form-controls">
                                            <span id="kode"><?php echo $pohon->kode; ?></span>
                                            <input id="kode_input" name="kode" type="hidden" >
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">BLOK</label>
                                        <div class="uk-form-controls">
                                            <input id="blok_input" class="pohon_input uk-input field-default" name="blok"
                                                type="number" min="001" max="999" placeholder="Blok..." value="<?php echo $pohon->blok; ?>" required>
                                                <small class="uk-text-danger">Menggunakan 3 Digit Angkat Contoh: 001</small>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">BARIS</label>
                                        <div class="uk-form-controls">
                                            <input id="baris_input" class="pohon_input uk-input field-default" name="baris"
                                                type="number" min="001" max="999" placeholder="Baris..." value="<?php echo $pohon->baris; ?>" required>
                                                <small class="uk-text-danger">Menggunakan 3 Digit Angkat Contoh: 001</small>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">NO POHON</label>
                                        <div class="uk-form-controls">
                                            <input id="no_pohon_input" class="pohon_input uk-input field-default" name="no_pohon"
                                                type="number" min="001" max="999" placeholder="No Pohon..." value="<?php echo $pohon->no_pohon; ?>" required>
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
                </script>