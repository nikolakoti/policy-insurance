<div class="container">
    <table class="table table-sm table-dark mt-5 mb-5">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Policy holder</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Type of travel</th>
                <th scope="col">Departure - Return</th>
                <th scope="col">Insurers group</th>
                <th scope="col">Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($holders as $holder) { ?>
                <tr class="text-center">
                    <th scope="row"><?php echo htmlspecialchars($holder['id']); ?></th>
                    <td><?php echo htmlspecialchars($holder['policy_holder']); ?></td>
                    <td><?php echo htmlspecialchars($holder['email']); ?></td>
                    <td><?php echo htmlspecialchars($holder['phone']); ?></td>
                    <td><?php echo htmlspecialchars($holder['type_of_travel']); ?></td>
                    <td><?php
                        $departureDate = date_create($holder['departure_date']);
                        $returnDate = date_create($holder['return_date']);

                        $newDepartureFormat = date_format($departureDate, 'M d');
                        $newReturnFormat = date_format($returnDate, 'M d');

                        echo htmlspecialchars($newDepartureFormat . " - " . $newReturnFormat);
                        ?></td>
                    <?php if ($holder['insurers_group'] !== NULL) { ?>
                        <td>
                            <?php echo htmlspecialchars($holder['insurers_group']); ?>
                        </td>
                    <?php } else { ?>
                        <td>
                            <?php echo htmlspecialchars('/'); ?>
                        </td>
                    <?php } ?>
                    <td><?php echo htmlspecialchars($holder['created_at']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

