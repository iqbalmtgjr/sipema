<div class="modal fade" id="akta" tabindex="-1" role="dialog" aria-labelledby="aktaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aktaLabel">Upload File Akta Lahir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('postAkta') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control @error('akta_lahir') is-invalid @enderror"
                        name="akta_lahir">
                    <p class="text-warning">(Format file : .jpg|png|pdf, Besar file maksimal 5MB)</p>
                    @error('akta_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
