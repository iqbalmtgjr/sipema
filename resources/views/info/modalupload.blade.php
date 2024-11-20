<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="buktiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buktiLabel">Upload Bukti Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('uploadBuktibayar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti">
                    <p class="text-warning">(Format file : .jpg, png. Besar file maksimal 5MB)</p>
                    @error('bukti')
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
<script>
    function getdata(id) {
        // console.log(id)
        var url = '{{ url('getdata') }}' + '/' + id
        // console.log(url);

        $.ajax({
            url: url,
            cache: false,
            success: function(response) {
                console.log(response);
                $('#id').val(response.id_bukti_bayar);
            }
        });
    }
</script>
