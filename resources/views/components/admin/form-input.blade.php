<div class="border-[1.5px] w-[40%] my-2 px-2 focus-within:border-[1.5px] focus-within:border-blue-500">
  <form action="" method="post" class="flex justify-between">
    @csrf
    <input type="text" placeholder="Tìm kiếm..." name="users-search" class="caret-blue-500 outline-none w-full py-2 " required>
      <button type="submit" class="inline-block bg-blue-300 w-[18%] my-1 cursor-pointer top-0.5 right-1">
        <i class="fa-solid fa-magnifying-glass text-white"></i>
      </button>
  </form>
</div>