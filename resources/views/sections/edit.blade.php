  <!-- Basic modal -->
  <div class="modal" id="edit{{ $section->id }}">>
      <div class="modal-dialog" role="document">
          <div class="modal-content modal-content-demo">
              <div class="modal-header">
                  <h6 class="modal-title">أضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                      type="button"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('sections.update', $section->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="">
                          <div class="form-group">
                              <label for="exampleInputSection">أسم القسم</label>
                              <input type="text" name="section_name" value="{{ $section->section_name }}"
                                  class="form-control" id="exampleInputSection" placeholder="أسم القسم">
                              @error('section_name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputDesc">الوصف</label>
                              <textarea id="exampleInputDesc" value="{{ $section->description }}" class="form-control" name="description"
                                  placeholder="Textarea" rows="3"></textarea>
                              @error('description')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="modal-footer">
                          <button class="btn ripple btn-primary" type="submit">تأكيد البيانات</button>
                          <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- End Basic modal -->
