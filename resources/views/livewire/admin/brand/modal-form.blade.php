 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <form wire:submit.prevent="storeBrand()">
                 <div class="modal-body">
                    <div class="mb-3">
                        <label>Select category</label>
                        <select wire:model.defer="category_id" class="form-control" required>
                            <option value="">--Select Category--</option>

                            @foreach ($categories as $cateItem)
                                <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                     <div class="mb-3">
                         <label for="">Brand name</label>
                         <input type="text" wire:model.defer="name" class="form-control">
                         @error('name')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <label for="">Brand slug</label>
                         <input type="text" wire:model.defer="slug" class="form-control">
                         @error('slug')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                     <div class="mb-3">
                         <label for="">Status</label> <br />
                         <input type="checkbox" wire:model.defer="status"> Checked = Hidden, Un-checked = visible
                         @error('status')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" wire:click="closeModal"
                         data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>

             </form>
         </div>
     </div>
 </div>


 <!-- Brand Update Modal -->
 <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brands</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>
                 <form wire:submit.prevent="updateBrand()">
                     <div class="modal-body">
                         <div class="mb-3">
                             <label>Select category</label>
                             <select wire:model.defer="category_id" class="form-control" required>
                                 <option value="">--Select Category--</option>

                                 @foreach ($categories as $cateItem)
                                     <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                 @endforeach
                             </select>
                             @error('category_id')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label for="">Brand name</label>
                             <input type="text" wire:model.defer="name" class="form-control">
                             @error('name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label for="">Brand slug</label>
                             <input type="text" wire:model.defer="slug" class="form-control">
                             @error('slug')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label for="">Status</label> <br />
                             <input type="checkbox" wire:model.defer="status" style="width:20px;height:20px;"> Checked =
                             Hidden, Un-checked = visible
                             @error('status')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" wire:click="closeModal"
                             data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Update</button>
                     </div>

                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Brand Delete Modal -->
 <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
                 <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div wire:loading class="p-2">
                 <div class="spinner-border text-primary" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>Loading...
             </div>
             <div wire:loading.remove>
                 <form wire:submit.prevent="destroyBrand()">
                     <div class="modal-body">
                         <h4>Are you want to delete this data ?</h4>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" wire:click="closeModal"
                             data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Yes, Delete</button>
                     </div>

                 </form>
             </div>
         </div>
     </div>
 </div>
