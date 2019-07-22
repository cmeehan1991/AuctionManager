<div class="container-fluid">
	<div class="row">
		<div class="col">
			<h2>Add/Edit Item</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<form onsubmit="return saveItem()" name="single-item-form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="itemId">ID</label>
							<input type="text" name="itemId" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label for="itemCategory">Category</label>
							<select class="form-control" name="itemCategory" required>
								<option value="appliances">Appliances</option>
								<option value="automobiles">Automobiles</option>
								<option value="watercraft">Boats &amp; Watercraft</option>
								<option value="getaways">Get Aways</option>
								<option value="certificates">Gift Certificates &amp; Vouchers</option>
								<option value="homegoods">Home Goods</option>
								<option value="services">Services</option>
							</select>
						</div>
						<div class="form-group">
							<label for="itemName">Item Name</label>
							<input type="text" name="itemName" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="itemDescription">Item Description</label>
							<textarea class="form-control" name="itemDescription" rows="4" required></textarea>
						</div>
						<div class="form-group">
							<label for="itemValue">Item Value</label>
							<input type="number"  min="0.00" name="itemValue" class="form-control" value="0.00">
						</div>
						<div class="form-group">
							<label for="itemQuantity">Item Quantity</label>
							<input type="number"  min="0.00" name="itemQuantity" class="form-control" value="0.00" required>
						</div>
						<div class="form-group">
							<label for="dateAcquited">Date Acquired</label>
							<input type="datetime-local" name="dateAcquired" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="donorName">Donated By</label>
							<input type="text" name="donorName" class="form-control">
						</div>
					</div>
					<!--
					<div class="col-md-4 ml-auto">
						<div class="item-image--edit">
							<img class="item-image--edit-image" src="" alt="">
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="itemImage" onchange="showImagePreview()" accept="image/x-png, image/gif, image/jpeg, image/jpg">
							<label class="custom-file-label" for="itemImage">Choose file</label>
						</div>
					</div>
					-->
					<div class="col">
						<button type="submit" class="btn btn-secondary">Save Changes</button>
						<button type="button" onclick="return deleteItem()" class="btn btn-danger" id="deleteItemPopover">Delete Item</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000">
				<div role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-body"></div>
				</div>
			</div>
		</div>
	</div>
</div>