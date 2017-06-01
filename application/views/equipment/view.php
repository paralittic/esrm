<head>
	<title><?php echo $equipment['eq_name']; ?> - Logi</title>

</head>

<?php $bar = new BARCODE(); ?>

<h2 style="text-transform: uppercase;">Equipment - <?php echo $equipment['eq_name']; ?></h2>

<table class="table table-striped table-hover ">
	<tr><td style="font-weight: bold">Name</td><td><?php echo $equipment['eq_name']; ?></td></tr>
	<tr><td style="font-weight: bold">Group</td><td><a href="/equipment/groups/<?php echo $equipment['eqgroup_id']; ?>"><?php echo $equipment['eqgroup_name']; ?></a></td></tr>
	<tr><td style="font-weight: bold">Description</td><td><?php echo $equipment['eq_description']; ?></td></tr>
	<tr><td style="font-weight: bold">Consumable?</td><td><?php echo $equipment['eq_consumable']; ?></td></tr>
	<tr><td style="font-weight: bold">Category</td><td><?php echo $equipment['eq_category']; ?></td></tr>
	<tr><td style="font-weight: bold">Size</td><td><?php echo $equipment['eq_size']; ?></td></tr>
	<tr><td style="font-weight: bold">Brand</td><td><?php echo $equipment['eq_brand']; ?></td></tr>
	<tr><td style="font-weight: bold">Supplier</td><td><?php echo $equipment['eq_supplier']; ?></td></tr>
	<tr><td style="font-weight: bold">Item in service?</td><td><?php echo $equipment['eq_in_service']; ?></td></tr>
	<tr><td style="font-weight: bold">Inspection Frequency</td><td><?php echo $equipment['eq_inspection_frequency']; ?></td></tr>
	<tr><td style="font-weight: bold">Equipment ID</td><td><?php echo $equipment['eq_id']; ?></td></tr>
	<tr><td style="font-weight: bold">Serial</td><td><?php echo $equipment['eq_serial']; ?></td></tr>
    <tr><td style="font-weight: bold">Model</td><td><?php echo $equipment['eq_model']; ?></td></tr>
	<tr><td style="font-weight: bold">Barcode</td><td><img src='<?php $bar = new BARCODE(); echo $bar->BarCode_link("Code39", $equipment['eq_id'], 50, 1, "#ffffff", "#000000"); ?>' /></td></tr>
	<tr><td style="font-weight: bold">QR</td><td><img src='<?php $bar = new BARCODE(); echo $bar->QRCode_link('text', site_url('/equipment/'. $equipment['eq_id']), 100, 2); ?>' /></td></tr>
</table>


<div class="row">
    <div class="col-md-6">
        <h3>Issues</h3>
        <table class="table table-striped table-hover ">
            <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Reported Date</th>
            <th>Status</th>
            </thead>
            <tbody>
            <?php foreach($issues as $issue) : ?>
                <tr>
                    <td><a href="/issues/<?php echo $issue['iss_id']; ?>"><?php echo $issue['iss_id']; ?></a></td>
                    <td><a href="/issues/<?php echo $issue['iss_id']; ?>"><?php echo $issue['iss_title']; ?></a></td>
                    <td><?php echo $issue['iss_reported_date']; ?></td>
                    <td><?php echo $issue['iss_status']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-default" role="button" href="/issues/create/<?php echo $equipment['eq_id']; ?>">New Issue</a>
    </div>
    <div class="col-md-6">
        <h3>Locations</h3>
        <table class="table table-striped table-hover ">
            <thead>
            <th>Name</th>
            <th>Qty</th>
            </thead>
            <tbody>
            <?php foreach($locations as $location) : ?>
                <tr>
                    <td><a href="/locations/<?php echo $location['loc_id']; ?>"><?php echo $location['loc_name']; ?></a></td>
                    <td><?php echo $location['eqloc_quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<hr />
<a class="btn btn-default" role="button" href="<?php echo site_url('/equipment/create'); ?>">Create Equipment</a>
<a class="btn btn-info" role="button" href="<?php echo site_url('/equipment/edit/'. $equipment['eq_id']); ?>">Edit Equipment</a>

<a href="<?php echo site_url('/equipment/delete/'. $equipment['eq_id']); ?>"
        class="btn btn-large btn-primary" data-toggle="confirmation"
        data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-ban-circle"
        data-btn-ok-class="btn-danger"
        data-btn-cancel-label="Return" data-btn-cancel-icon="glyphicon glyphicon-share-alt"
        data-btn-cancel-class="btn-success"
        data-title="Confirm Deletion" data-content="Are you sure you want to delete?">
    Delete
</a>
<script>
    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        // other options
    });
</script>