<?php   include("./inc/header.php");  ?>

<div class="report-wrapper">
    <section class="report-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="report-generator.php">Report Generator</a></li>
        </ul>
    </section>
</div>

<div class="report-form-wrapper">

    <form class="report-form" action="report.php" method="post">

    <h1>Report Filters</h1>
       
        <!-- Country input -->
        <div class="row">
            <div class="label-column">
                <label for="country">Country</label>
            </div>
            <div class="input-column">
                <select id="country" name="country" required>
                    <option value="Australia">Australia</option>
                    <option value="New Zealand">New Zealand</option>
                </select>
            </div>
        </div>

        <!-- State input -->
        <div class="row">
            <div class="label-column">
                <label for="state">State</label>
            </div>
            <div class="input-column">
                <select id="state" name="state" required>
                    <option value="nsw">New South Wales</option>
                    <option value="qld">Queensland</option>
                    <option value="vic">Victoria</option>
                    <option value="sa">South Australia</option>
                    <option value="wa">Western Australia</option>
                    <option value="act">Australian Capital Territory</option>
                    <option value="nt">Northern Territory</option>
                </select>
            </div>
        </div>

        <!-- Gender input -->
        <div class="row">
            <div class="label-column">
                <label for="gender">Gender</label>
            </div>
            <div class="input-column">
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>

        <!-- age input -->
        <div class="row">
            <div class="label-column">
                <label for="age">Age</label>
            </div>
            <div class="input-column">
                <select id="age" name="age" required>
                    <option value="01-18">18 and Under</option>
                    <option value="19-29">19 to 29</option>
                    <option value="30-39">30 to 39</option>
                    <option value="40-49">40 to 49</option>
                    <option value="50-59">50 to 59</option>
                    <option value="60-69">60 to 69</option>
                    <option value="70-99">70 to 99</option>
                </select>
            </div>
        </div>

        <!-- Gender input -->
        <div class="row">
            <div class="label-column">
                <label for="gender-orientation">Gender Orientation</label>
            </div>
            <div class="input-column">
                <select id="gender-orientation" name="gender-orientation" required>
                    <option value="heterosexual">Heterosexual</option>
                    <option value="homosexual">Homosexual</option>
                    <option value="bisexual">Bisexual</option>
                </select>
            </div>
        </div>

        <br>
        <div class="row">
            <input type="submit" value="submit" name='report-submit'>
        </div>
    </form>              
</div>





        
<?php   include("./inc/footer.php");  ?>