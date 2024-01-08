<form action="{{ route('admin.vendors.toggle-status', $vendor->id) }}" method="post">
  @csrf
  @method('PATCH')
  <button type="submit">
    <x-td-action-button>
      <x-icons.arrow-path class="w-5 h-5" />
    </x-td-action-button>
  </button>
</form>
