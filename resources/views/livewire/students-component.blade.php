<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5><strong>All Students</strong></h5>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal" >Add New Student</button>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>  <span>{{Session::get('success')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      
                        @endif
                        <table class="table table-striped">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($students->count() > 0)
                                    
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone}}</td>
                                    
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <small>No Student Found</small>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form wire:submit.prevent='storeStudentData'>
                <div class="form-group row mb-2">
                    <label for="student_id" class="col-3">Student ID</label>
                    <div class="col-9">
                        <input type="number"  wire:model="student_id" id="student_id" class="form-control">
                        @error('student_id')
                            <span class="text-danger" style="font-size: 11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="name" class="col-3">Name</label>
                    <div class="col-9">
                        <input type="text" wire:model="name" id="name" class="form-control">
                        @error('name')
                            <span class="text-danger" style="font-size: 11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="email" class="col-3">E-mail</label>
                    <div class="col-9">
                        <input type="text" wire:model="email" id="email" class="form-control">
                        @error('email')
                            <span class="text-danger" style="font-size: 11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="phone" class="col-3">Phone</label>
                    <div class="col-9">
                        <input type="text" wire:model="phone" id="phone" class="form-control">
                        @error('phone')
                            <span class="text-danger" style="font-size: 11px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="student_id" class="col-3"></label>
                    <div class="col-9">
                        <button type="submit" class="btn btn-sm btn-primary">add Student</button>
                    </div>
                </div>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>


@push('script')
    <script>
        window.addEventListener('close-modal',event=>{
            $('#addStudentModal').modal('hide')
        })
    </script>
@endpush