<div class="modal fade" id="modalCreate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="formCreate" name="formCreate" class="form-horizontal">
                    <div class="form-group">
                    <input type="hidden" name="id" id="id">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Nama Barang</label>
                            <div class="col-sm-9">
                                <select name="barang_id" class="form-control" required>
                                    <option disable="true" selected="true" disabled>--- Pilih Seragam ---</option>
                                    @foreach($seragam as $p)
                                    <option value="{{$p->id}}">{{$p->nama}} ({{$p->ukuran}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="jumlah">Jumlah</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="keterangan">Keterangan</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan (Jika ada)" value="" maxlength="50" required="">
                                </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary" id="saveBtn" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="metismenu-icon pe-7s-close"></i>Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>