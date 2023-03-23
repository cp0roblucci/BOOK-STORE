@extends('admin.layout.main')

{{-- set title --}}
@section('title', 'Create new User')
@section('path', 'Users / New User')

@section('sidebar')
  @include('admin.layout.sidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('admin.layout.header')
    @endsection

    <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Create new User</div>
    <div class="">
      <div class="col-span-3 border p-4">
        <form action="" method="post">
          @csrf
          <div class="flex items-center justify-between mt-1 mb-6">
              <div class="w-80 h-32 mr-10">
                {{-- <img 
                  src="{{ URL::to('/images/admin/vtd.png')}}" 
                  alt="avatar" 
                  class="w-full h-full rounded-full"
                > --}}
                <img
                  id="img-preview"
                  src="{{ URL::to('/images/admin/fish-default.png')}}" 
                  alt="avatar" 
                  class="w-full h-full"
                >
              </div>
    
              <input
                id="input-file-img"
                type="file"
                name="avatar"
                placeholder=""
                class="w-full py-8 text-14 border border-slate-500 file:ml-2 rounded-lg border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
              >
            </div>
  
  
          <div class="grid grid-cols-2 gap-4">
            <div class="">
              <label 
                for="species" 
                class="text-slate-500 text-14"
              >
                Species
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <input 
                  type="text" 
                  name="species" 
                  placeholder="Species"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14" 
                >
              </div>
            </div>
  
            <div class="">
              <label 
                for="fishname"
                class="text-slate-500 text-14"
              >
                Name
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <input 
                  type="text" 
                  name="fishname" 
                  placeholder="Name"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14" 
                >
              </div>
            </div>
    
            <div class="">
              {{-- <label
                for="phonenumber"
                class="text-slate-500 text-14"
              >
                Phone number
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <i class="fa-solid fa-mobile-screen px-2"></i>
                <input 
                  type="number"
                  name="phonenumber"
                  placeholder="(012) 345-6789"
                  class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14" 
                >
              </div> --}}
              <label
                for="phonenumber"
                class="text-slate-500 text-14"
              >
                PH Level
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <select 
                  name="phlevel" 
                  id="ph_level"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                >
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                </select>
              </div>
                
            </div>
            
            <div class="">
              <label
                for="phonenumber"
                class="text-slate-500 text-14"
              >
                Color
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <select 
                  name="phlevel" 
                  id="ph_level"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                >
                  <option value="red">Red</option>
                  <option value="blue">Blue</option>
                  <option value="green">Green</option>
                  <option value="gold">Gold</option>
                  <option value="yellow">Yellow</option>
                </select>
              </div>
            </div>
          </div>
  
          <div class="mt-4 ">
            <label 
              for="habit"
              class="text-slate-500 text-14"
            >
              Habit
            </label><br>
            <div class="border-[1.5px] mt-1">
              <input 
                type="text"
                name="habit"
                placeholder="Habit"
                class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
              >
            </div>
          </div>
  
          <div class="mt-4 ">
            <label 
              for="description"
              class="text-slate-500 text-14"
            >
              Description
            </label><br>
            <div class="border-[1.5px] mt-1">
              <input 
                type="text"
                name="description"
                placeholder="Description"
                class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
              >
            </div>
          </div>
          
  
          <button 
            type="submit" 
            class="border-2 border-blue-500 p-2 px-6 mt-4 flex hover:bg-slate-100"
          >
            Create
          </button>
  
        </form>
      </div>
  
    </div >
  </div>  

@endsection

@section('footer')
  @include('admin.layout.footer')
@endsection