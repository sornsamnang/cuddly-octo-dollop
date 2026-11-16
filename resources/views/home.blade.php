<x-default>
  <x-navbar/>
  <main
    class="container-fluid d-flex flex-column gap-4 px-0" 
    style="margin-top: 72px; max-width: 500px;"
  >
    @foreach ($cards as $card)  
      <x-card 
        :card="$card"
      />
    @endforeach
    <x-add_modal/>
  </main>
</x-default>