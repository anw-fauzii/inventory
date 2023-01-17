<div class="modal fade" id="modalCreate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form action="{{route('laporan.masuk')}}" class="form-horizontal">
                    <div class="form-group">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="mulai">Mulai</label>
                            <div class="col-sm-9"><input type="date" class="form-control" id="mulai" name="mulai" placeholder="Masukan jumlah" value="{{$startDate}}" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="selesai">selesai</label>
                            <div class="col-sm-9"><input type="date" class="form-control" id="selesai" name="selesai" placeholder="Masukan selesai (Jika ada)" value="{{$endDate}}" maxlength="50" required="">
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