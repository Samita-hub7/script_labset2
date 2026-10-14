<!DOCTYPE html>
<html>

<head>

    <title>Annual Income Tax Calculator</title>

    <style>

        body {
            font-family: "Times New Roman", serif;
            padding: 20px;
        }

        h1 {
            font-size: 42px;
        }

        label {
            font-size: 28px;
        }

        input, select {
            font-size: 24px;
            padding: 8px;
            width: 350px;
        }

        button {
            font-size: 24px;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .result {
            margin-top: 30px;
            font-size: 24px;
        }

        table {
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px 20px;
        }

        th {
            background-color: #ddd;
        }

    </style>

</head>

<body>

<h1>Annual Income Tax Calculator</h1>

<form method="post">

    <label>Annual Taxable Income:</label>

    <input type="number"
           name="income"
           placeholder="Enter annual income"
           min="0"
           required>

    <br><br>

    <label>Gender:</label>

    <select name="gender" required>

        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>

    </select>

    <br><br>

    <button type="submit" name="calculate">
        Calculate Tax
    </button>

</form>


<?php

if (isset($_POST['calculate'])) {

    $income = floatval($_POST['income']);
    $gender = $_POST['gender'];

    $remaining = $income;
    $totalTax = 0;

    $tax1 = 0;
    $tax2 = 0;
    $tax3 = 0;
    $tax4 = 0;
    $tax5 = 0;


    /* First slab: Up to 1,000,000 at 1% */

    if ($remaining > 0) {

        $amount = min($remaining, 1000000);

        $tax1 = $amount * 0.01;

        $totalTax += $tax1;

        $remaining -= $amount;
    }


    /* Second slab: Next 500,000 at 10% */

    if ($remaining > 0) {

        $amount = min($remaining, 500000);

        $tax2 = $amount * 0.10;

        $totalTax += $tax2;

        $remaining -= $amount;
    }


    /* Third slab: Next 1,000,000 at 20% */

    if ($remaining > 0) {

        $amount = min($remaining, 1000000);

        $tax3 = $amount * 0.20;

        $totalTax += $tax3;

        $remaining -= $amount;
    }


    /* Fourth slab: Next 1,500,000 at 27% */

    if ($remaining > 0) {

        $amount = min($remaining, 1500000);

        $tax4 = $amount * 0.27;

        $totalTax += $tax4;

        $remaining -= $amount;
    }


    /* Fifth slab: Above 4,000,000 at 29% */

    if ($remaining > 0) {

        $tax5 = $remaining * 0.29;

        $totalTax += $tax5;
    }


    /* Female taxpayer gets 10% discount */

    $discount = 0;

    if ($gender == "Female") {

        $discount = $totalTax * 0.10;
    }


    $netTax = $totalTax - $discount;

    $netIncome = $income - $netTax;


?>

<div class="result">

    <h2>Tax Calculation Result</h2>

    <p>
        <b>Annual Taxable Income:</b>
        NPR <?php echo number_format($income, 2); ?>
    </p>

    <p>
        <b>Gender:</b>
        <?php echo $gender; ?>
    </p>


    <h3>Tax Calculated Under Each Applicable Slab</h3>

    <table>

        <tr>
            <th>Tax Slab</th>
            <th>Rate</th>
            <th>Tax Amount</th>
        </tr>

        <?php if ($tax1 > 0) { ?>

        <tr>
            <td>Up to NPR 1,000,000</td>
            <td>1%</td>
            <td>NPR <?php echo number_format($tax1, 2); ?></td>
        </tr>

        <?php } ?>


        <?php if ($tax2 > 0) { ?>

        <tr>
            <td>Next NPR 500,000</td>
            <td>10%</td>
            <td>NPR <?php echo number_format($tax2, 2); ?></td>
        </tr>

        <?php } ?>


        <?php if ($tax3 > 0) { ?>

        <tr>
            <td>Next NPR 1,000,000</td>
            <td>20%</td>
            <td>NPR <?php echo number_format($tax3, 2); ?></td>
        </tr>

        <?php } ?>


        <?php if ($tax4 > 0) { ?>

        <tr>
            <td>Next NPR 1,500,000</td>
            <td>27%</td>
            <td>NPR <?php echo number_format($tax4, 2); ?></td>
        </tr>

        <?php } ?>


        <?php if ($tax5 > 0) { ?>

        <tr>
            <td>Above NPR 4,000,000</td>
            <td>29%</td>
            <td>NPR <?php echo number_format($tax5, 2); ?></td>
        </tr>

        <?php } ?>

    </table>


    <p>
        <b>Total Tax:</b>
        NPR <?php echo number_format($totalTax, 2); ?>
    </p>


    <?php if ($gender == "Female") { ?>

    <p>
        <b>Female Tax Discount (10%):</b>
        NPR <?php echo number_format($discount, 2); ?>
    </p>

    <?php } ?>


    <p>
        <b>Total Tax Payable:</b>
        NPR <?php echo number_format($netTax, 2); ?>
    </p>


    <p>
        <b>Net Income After Tax:</b>
        NPR <?php echo number_format($netIncome, 2); ?>
    </p>

</div>

<?php

}

?>

</body>

</html>