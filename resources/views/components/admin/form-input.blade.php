<div class="w-[50%] leading-8 pl-4 bg-slate-100 rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-slate-400">
  <form action="" method="post" class="flex justify-between">
    @csrf
    <input type="text" placeholder="Search..." name="users-search" class="caret-blue-500 rounded-md outline-none w-full bg-slate-100 relative" required>
      <button type="submit" class="inline-block top-1.5 absolute right-[340px]">
        {{-- <i class="fa-solid fa-magnifying-glass text-slate-500"></i> --}}
        <lord-icon
          src="https://cdn.lordicon.com/zniqnylq.json"
          trigger="click"
          style="width:24px;height:24px">
      </lord-icon>
      </button>
  </form>
</div>