<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoLabel">Upload File Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('postFoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                    <p class="text-warning">(Format file : .jpg|png, Besar file maksimal 5MB)</p>
                    @error('foto')
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
