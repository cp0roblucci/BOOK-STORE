<div class="w-[50%] leading-8 pl-4 bg-slate-100 rounded-md border-[1.5px] focus-within:border-[1.5px] focus-within:border-slate-400">
  <form action="" method="post" class="flex justify-between">
    @csrf
    <input type="text" placeholder="Search..." name="users-search" class="caret-blue-500 outline-none w-full bg-slate-100" required>
      <button type="submit" class="inline-block w-[18%] cursor-pointer top-0.5">
        <i class="fa-solid fa-magnifying-glass text-slate-500"></i>
      </button>
  </form>
</div>