@extends('layouts.index')

@section('title', 'Data Nilai')
@section('page-title', 'Data Nilai')
@section('create-url', '/input_nilai')

@section('table-headers')
    <th>NIM</th>
    <th>Nama Mahasiswa</th>
    <th>Mata Kuliah</th>
    <th>Nilai</th>
    <th>Berkas</th>
    <th width="220">Action</th>
@endsection

@section('table-rows')
    @foreach ($nilai as $n)
        <tr>
            <td>{{$n->mahasiswa->NIM}}</td>
            <td>{{$n->mahasiswa->nama}}</td>
            <td>{{$n->mataKuliah->nama_mk}}</td>
            <td>{{$n->nilai}}</td>
            <td>
                @if($n->berkas)
                    <a href="{{ asset('dokumen/' . $n->berkas) }}" target="_blank">
                        {{ $n->berkas }}
                    </a>
                @else
                    <span class="text-muted">Tidak ada berkas</span>
                @endif
            </td>
            <td>
                <button type="button"
                        class="btn btn-success btn-action btn-edit"
                        data-href="{{ url('/edit_nilai/' . $n->id_nilai) }}">
                    Edit
                </button>

                <button type="button"
                        class="btn btn-danger btn-action btn-delete"
                        data-href="{{ url('/hapus_nilai/' . $n->id_nilai) }}">
                    Hapus
                </button>

                <button type="button"
                        class="btn btn-sm btn-primary btn-action btn-view"
                        data-file="{{ $n->berkas ? asset('dokumen/' . $n->berkas) : '' }}">
                    View
                </button>
            </td>
        </tr>
    @endforeach

    <!-- Modal untuk preview dokumen (letakkan di luar loop) -->
    <div class="modal fade" id="viewDocModal" tabindex="-1" role="dialog" aria-labelledby="viewDocModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewDocModalLabel">Preview Dokumen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="docWrapper">
                <iframe id="docFrame" src="" width="100%" height="600px" style="display:none;border:0;"></iframe>
                <p id="noDocMsg" class="text-center text-muted" style="display:none;margin:40px 0;">Tidak ada dokumen untuk ditampilkan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // navigasi untuk Edit dan Hapus — gunakan data-href untuk menghindari masalah href yang diblokir
            document.querySelectorAll('.btn-edit').forEach(function(btn){
                btn.addEventListener('click', function(e){
                    var href = this.getAttribute('data-href');
                    if(href) window.location.href = href;
                });
            });

            document.querySelectorAll('.btn-delete').forEach(function(btn){
                btn.addEventListener('click', function(e){
                    var href = this.getAttribute('data-href');
                    if (!href) return;
                    if (confirm('Are you sure you want to delete this item?')) {
                        window.location.href = href;
                    }
                });
            });

            // view dokumen
            var viewButtons = document.querySelectorAll('.btn-view');
            viewButtons.forEach(function(btn){
                btn.addEventListener('click', function(){
                    var file = this.getAttribute('data-file');
                    var iframe = document.getElementById('docFrame');
                    var noDocMsg = document.getElementById('noDocMsg');

                    if (file && file !== '') {
                        iframe.style.display = 'block';
                        iframe.src = file;
                        noDocMsg.style.display = 'none';
                    } else {
                        iframe.style.display = 'none';
                        iframe.src = '';
                        noDocMsg.style.display = 'block';
                    }

                    // gunakan Bootstrap 5 modal API jika tersedia
                    if (window.bootstrap && typeof bootstrap.Modal === 'function') {
                        var modalEl = document.getElementById('viewDocModal');
                        var modal = new bootstrap.Modal(modalEl);
                        modal.show();

                        modalEl.addEventListener('hidden.bs.modal', function () {
                            iframe.src = '';
                        }, { once: true });
                    } else if (window.jQuery && typeof jQuery('#viewDocModal').modal === 'function') {
                        jQuery('#viewDocModal').modal('show');
                        jQuery('#viewDocModal').on('hidden.bs.modal', function () { iframe.src = ''; });
                    } else {
                        // fallback: tampilkan modal element sederhana
                        var modal = document.getElementById('viewDocModal');
                        modal.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection