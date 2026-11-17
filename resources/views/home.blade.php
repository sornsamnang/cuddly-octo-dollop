<x-default>
  <x-navbar/>
  <main
    class="container-fluid d-flex flex-column gap-4 px-0" 
    style="margin-top: 72px; max-width: 500px;"
  >
  
    @foreach ($cards as $value)  
      <x-card :card="$value"/>
    @endforeach

    <x-add_modal/>

    @if($show_modal ?? false)
      <x-edit_modal :card="$card ?? null"/>   
    @endif
  </main>
</x-default>