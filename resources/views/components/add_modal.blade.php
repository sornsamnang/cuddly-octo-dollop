<dialog 
  id="addDialog"
  class="dialog dialog-scrollable sm-down:dialog-fullscreen"
>
  <div class="dialog-header">
    <h1 class="dialog-title">Create</h1>
    <button 
      type="button" 
      class="btn-close" 
      data-bs-dismiss="dialog" 
      aria-label="Close">
    </button>
  </div>

  <div class="dialog-body">
    <form action="{{ url("card") }}" method="POST" id="form" enctype="multipart/form-data">
      @csrf
      <div class="form-field">
        <label for="title" class="form-label mb-2">Title</label>
        <input 
          name="title" 
          type="text" 
          class="form-control" 
          id="title" 
          placeholder="Title"
        >
      </div>
      <div class="form-field mt-6">
        <label for="formFileLg" class="form-label">Images</label>
        <input 
          name="files[]"
          class="form-control" 
          id="formFileLg" 
          type="file" 
          accept="image/png, image/jpeg"
          multiple="true"
        >
      </div>
      <div class="form-field mt-6">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" rows="5"></textarea>
      </div>
    </form>
  </div>

  <div class="dialog-footer">
    <button
      name="save"
      type="submit"
      form="form"
      class="theme-primary btn-solid btn-styled"
      data-bs-toggle="dialog"
    >
      <i class="bi bi-floppy2"></i>
      Save
    </button>
  </div>
</dialog>