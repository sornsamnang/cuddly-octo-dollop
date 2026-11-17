@props(["card"])

<dialog 
  id="editDialog"
  class="dialog dialog-scrollable sm-down:dialog-fullscreen"
>
  <div class="dialog-header">
    <h1 class="dialog-title">Edit</h1>
    <button
      type="button"
      class="btn-close"
      aria-label="Close"
      onclick="history.back()">
    </button>
  </div>

  <div class="dialog-body">
    <form 
      action="{{ route("card.update", $card->id) }}" 
      id="edit"
      method="POST" 
      enctype="multipart/form-data"
    >
      @csrf
      <input
        name="id"
        type="hidden"
        value="{{$card->id}}"
      >
      <div class="form-field">
        <label for="title" class="form-label mb-2">Title</label>
        <input 
          name="title" 
          type="text" 
          class="form-control" 
          id="title" 
          placeholder="Title"
          value="{{$card->title}}"
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
      <div class="grid text-center grid-cols-3 p-2 bg-1 mt-6 gap-2 rounded-5">
        <?php foreach($card->images as $image): ?>
          <div class="position-relative">
            <button 
              type="button"
              class="btn-icon rounded-circle position-absolute top-0 end-0 m-1"
              onclick="this.parentElement.remove()"
            >
              <i class="bi bi-x-lg"></i>
            </button>
            <img src="{{ url($image->path_name) }}"
              class="w-100 h-100 object-fit-contain bg-2 rounded-5" 
              style="height: 240px;"
              alt=""
            >
            <input
              name="images_id[]"
              type="hidden"
              value="{{ $image->id }}"
            >
          </div>
        <?php endforeach; ?>
      </div>
      <div class="form-field mt-6">
        <label for="description" class="form-label">Description</label>
        <textarea 
          name="description" 
          class="form-control" 
          id="description" 
          rows="5"
        >{{$card->description}}</textarea>
      </div>
    </form>
  </div>

  <div class="dialog-footer">
    <button
      name="edit"
      type="submit"
      form="edit"
      class="theme-primary btn-solid btn-styled"
      data-bs-toggle="dialog"
    >
      <i class="bi bi-floppy2"></i>
      Save
    </button>
  </div>
</dialog>

<script>
  window.addEventListener("DOMContentLoaded", () => {
    const dialog = document.getElementById("editDialog");
    dialog.showModal();
  });
</script>