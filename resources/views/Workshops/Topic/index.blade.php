@extends('index')

@section('head')
  <style>
    .error {
      color: red
    }
  </style>
@endsection

@section('body')
    @include('partials.preloader')

    <div class="main-banner" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="container">
        <div class="col-lg-12">
          <h2>Topik</h2>
          <div class="upper my-3">
            <button>
              <div class="flex" data-bs-toggle="modal" data-bs-target="#create">
                Buat Topik
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 6L12 18" stroke="#8B4BC4" stroke-width="2" stroke-linecap="round"/>
                  <path d="M18 12L6 12" stroke="#8B4BC4" stroke-width="2" stroke-linecap="round"/>
                </svg>
              </div>
            </button>
          </div>
          <div class="tabel first-service">
            <div class="row head">
              <div class="col-3">
                <p>Id</p>
              </div>
              <div class="col-6">
                <p>Nama Topik</p>
              </div>
              <div class="col-3">
                <p>Aksi</p>
              </div>
            </div>
            <hr>
            @foreach ($topics as $topic)
              <div class="row py-3">
                  <div class="col-3 judul">
                    <p>{{ $loop->iteration }}</p>
                  </div>
                  <div class="col-6 tanggal">
                    <p>{{ $topic->name }}</p>
                  </div>
                  <div class="col-3 d-flex justify-content-center">
                    <div class="d-flex flex-row">
                      <div style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{$topic->id}}, '{{$topic->name}}')">
                        <div class="p-2 text-center me-1" style="background-color: rgba(151, 93, 202, 1); border-radius: 5px;">
                          <!-- edit -->
                          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0863 7.91344L14.2498 6.75L14.2498 6.74997C14.3294 6.67034 14.3693 6.63052 14.4013 6.59526C15.0947 5.83244 15.0947 4.66756 14.4013 3.90474C14.3693 3.86949 14.3294 3.82967 14.2498 3.75005L14.2498 3.75C14.1701 3.67035 14.1303 3.63052 14.095 3.59847C13.3322 2.90508 12.1673 2.90508 11.4045 3.59847C11.3693 3.63052 11.3294 3.67035 11.2498 3.75L10.0688 4.93102C10.7821 6.17617 11.8241 7.21011 13.0863 7.91344ZM8.61405 6.38572L3.85615 11.1436C3.43109 11.5687 3.21856 11.7812 3.07883 12.0423C2.93909 12.3034 2.88015 12.5981 2.76226 13.1876L2.39686 15.0146C2.33034 15.3472 2.29708 15.5135 2.39168 15.6081C2.48629 15.7027 2.6526 15.6694 2.98521 15.6029L4.81219 15.2375L4.8122 15.2375C5.40164 15.1196 5.69637 15.0607 5.95746 14.9209C6.21856 14.7812 6.43109 14.5687 6.85614 14.1436L6.85614 14.1436L6.85615 14.1436L11.6278 9.37193C10.4169 8.60369 9.38944 7.58318 8.61405 6.38572Z" fill="white"/>
                          </svg>
                        </div>
                      </div>
                      <!-- delete -->
                      <div style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{$topic->id}})">
                        <div class="p-2 text-center" style="background-color: rgba(151, 93, 202, 1); border-radius: 5px;">
                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.875 4.25H2.125V6.375C2.9074 6.375 3.54167 7.00926 3.54167 7.79167V9.91667C3.54167 11.7464 3.54167 12.6613 3.92738 13.3466C4.19659 13.8248 4.59184 14.2201 5.0701 14.4893C5.75533 14.875 6.67022 14.875 8.5 14.875C10.3298 14.875 11.2447 14.875 11.9299 14.4893C12.4082 14.2201 12.8034 13.8248 13.0726 13.3466C13.4583 12.6613 13.4583 11.7464 13.4583 9.91667V7.79167C13.4583 7.00926 14.0926 6.375 14.875 6.375V4.25ZM7.72917 7.79167C7.72917 7.23938 7.28145 6.79167 6.72917 6.79167C6.17688 6.79167 5.72917 7.23938 5.72917 7.79167V11.3333C5.72917 11.8856 6.17688 12.3333 6.72917 12.3333C7.28145 12.3333 7.72917 11.8856 7.72917 11.3333V7.79167ZM11.2708 7.79167C11.2708 7.23938 10.8231 6.79167 10.2708 6.79167C9.71855 6.79167 9.27083 7.23938 9.27083 7.79167V11.3333C9.27083 11.8856 9.71855 12.3333 10.2708 12.3333C10.8231 12.3333 11.2708 11.8856 11.2708 11.3333V7.79167Z" fill="white"/>
                            <path d="M7.13193 2.3875C7.21265 2.31219 7.3905 2.24565 7.63791 2.19819C7.88533 2.15073 8.18847 2.125 8.50033 2.125C8.81218 2.125 9.11532 2.15073 9.36274 2.19819C9.61015 2.24565 9.78801 2.31219 9.86872 2.3875" stroke="white" stroke-width="2" stroke-linecap="round"/>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            <hr>
            <div class="d-flex justify-content-center" style="background-color: white">
              {!! $topics->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-4">
            <div class="popupHeaderReg">
              <span class="header_title">Buat Topik Workshop</span>
              <hr>
            </div>
            <div class="modal-body popupBody">
              <form action="/topic" method="post">
                @csrf

                Nama Topik
                <input class="mb-2" type="text" name="name" value="{{ old('name') }}" id="TopikCr">
                @error('name')
                    <div class="error">*{{ $message }}</div>
                @enderror
                <hr>
                <button class="btn-primary" type="submit">Selesaikan Aksi</button>
                <p class="pt-2" style="text-align: center; color: rgb(153, 151, 151); font-weight: 300;">*pastikan aksi yang anda lakukan baik dan benar</p>
              </form>
            </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-4">
            <div class="popupHeaderReg">
              <span class="header_title">Edit Topik Workshop</span>
              <hr>
            </div>
            <div class="modal-body popupBody">
              <form id="formEditTopik" method="post">
                @csrf
                @method('PUT')

                Nama Topik
                <input class="mb-2" type="text" name="topikEdit" id="editTopik">
                @error('topikEdit')
                    <div class="error">*{{ $message }}</div>
                @enderror

                <input type="hidden" name="id" id="Eid">
                <hr>
                <button class="btn-primary" type="submit">Selesaikan Aksi</button>
                <p class="pt-2" style="text-align: center; color: rgb(153, 151, 151); font-weight: 300;">*pastikan aksi yang anda lakukan baik dan benar</p>
              </form>
            </div>
          </div>
      </div>
    </div>
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-4">
            <div class="popupHeaderReg">
              <span class="header_title">Hapus Topik Workshop</span>
              <hr>
            </div>
            <div class="modal-body">
              <form method="post" id="hapusTopik">
                @csrf
                @method('DELETE')
      
                <p id="hd" style="color: black; font-weight: bold">Apakah anda yakin ingin menghapus topik ini ?</p>
                <div class="modal-footer px-0 py-2">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn-primary" name="submit"><i class="bi bi-x"></i><span> Delete</span></button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
@endsection

@section('scripts')
    @if (count($errors) > 0)
      @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
      @if ($bag->has('topikEdit'))
        <script type="text/javascript">
          $(document).ready(function() {
            $('#edit').modal('show');
              $("#editTopik").val(<?= json_encode(old('topikEdit')) ?>);
              $("#Eid").val(<?= json_encode(old('id')) ?>);
              $('#formEditTopik').attr('action', `/topic/${$("#Eid").val()}`);
          });
        </script>
      @elseif ($bag->has('name'))
        <script type="text/javascript">
            $(document).ready(function() {
                
                $('#create').modal('show');
                $("#TopikCr").val(<?= json_encode(old('name')) ?>);
            });
        </script>
      @endif
    @endif

    <script>
      function edit(id, name){
        $('#formEditTopik').attr('action', `/topic/${id}`);
        $("#editTopik").val(name);
        $("#Eid").val(id);
      }

      function hapus(id){
        $('#hapusTopik').attr('action', `/topic/${id}`);
      }
    </script>
@endsection