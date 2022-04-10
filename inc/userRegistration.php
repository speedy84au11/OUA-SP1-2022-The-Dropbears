<form action="/action_page.php">

    <!-- First name input -->
    <div class="row">
        <div class="label-column">
            <label for="fname">First Name</label>
        </div>
        <div class="input-column">
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
        </div>
    </div>

    <!-- Middle name input -->
    <div class="row">
        <div class="label-column">
            <label for="mname">Middle Name</label>
        </div>
        <div class="input-column">
            <input type="text" id="mname" name="middlename" placeholder="Your middle name..">
        </div>
    </div>

    <!-- Last name input -->
    <div class="row">
        <div class="label-column">
            <label for="lname">Last Name</label>
        </div>
        <div class="input-column">
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        </div>
    </div>

    <!-- Email input -->
    <div class="row">
        <div class="label-column">
            <label for="enail">Email</label>
        </div>
        <div class="input-column">
            <input type="text" id="email" name="email" placeholder="Your email name..">
        </div>
    </div>

    <!-- D.O.B input -->
    <div class="row">
        <div class="label-column">
            <label for="dob">Date Of Birth</label>
        </div>
        <div class="input-column">
            <input type="date" id="dob" name="dob">   
        </div>
    </div>

    <!-- Gender input -->
    <div class="row">
        <div class="label-column">
            <label for="gender">Gender</label>
        </div>
        <div class="input-column">
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
        </div>
    </div>

    <!-- Gender orientation input -->
    <div class="row">
        <div class="label-column">
            <label for="gender-orientation">Gender Orientation</label>
        </div>
        <div class="input-column">
            <select id="gender-orientation" name="gender-orientation">
                <option value="heterosexual">heterosexual</option>
                <option value="homosexual">Homosexual</option>
                <option value="bisexual">Bisexual</option>
            </select>
        </div>
    </div>

    <!-- Street number input -->
    <div class="row">
        <div class="label-column">
            <label for="steet-number">Street Number</label>
        </div>
        <div class="input-column">
            <input type="text" id="steet-number" name="steet-number" placeholder="Your street number..">
        </div>
    </div>


    <!-- Street input -->
    <div class="row">
        <div class="label-column">
            <label for="steet">Street</label>
        </div>
        <div class="input-column">
            <input type="text" id="steet" name="steet" placeholder="Your street name..">
        </div>
    </div>


    <!-- Street type input -->
    <div class="row">
        <div class="label-column">
            <label for="street-type">Street Type</label>
        </div>
        <div class="input-column">
            <input type="text" id="steet-type" name="steet-type" placeholder="Your street type..">
        </div>
    </div>

    <!-- Town input -->
    <div class="row">
        <div class="label-column">
            <label for="town">Town</label>
        </div>
        <div class="input-column">
            <input type="text" id="town" name="town" placeholder="Your town type..">
        </div>
    </div>

    <!-- Postcode input -->
    <div class="row">
        <div class="label-column">
            <label for="postcode">Postcode</label>
        </div>
        <div class="input-column">
            <input type="text" id="postcode" name="postcode" placeholder="Your postcode..">
        </div>
    </div>

    <!-- State input -->
    <div class="row">
        <div class="label-column">
            <label for="state">State</label>
        </div>
        <div class="input-column">
            <select id="state" name="state">
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

    <!-- Country input -->
    <div class="row">
        <div class="label-column">
            <label for="country">Country</label>
        </div>
        <div class="input-column">
            <select id="country" name="country">
                <option value="aus">Australia</option>
                <option value="nz">New Zealand</option>
            </select>
        </div>
    </div>

    <!-- Centerlink CRN input -->
    <div class="row">
        <div class="label-column">
            <label for="crn">Centerlink CRN</label>
        </div>
        <div class="input-column">
            <input type="text" id="crn" name="crn" placeholder="Your Centerlink CRN..">
        </div>
    </div>

    <!-- Password input -->
    <div class="row">
        <div class="label-column">
            <label for="pword">Password</label>
        </div>
        <div class="input-column">
            <input type="text" id="pword" name="pword" placeholder="Your password..">
        </div>
    </div>

    <br>
    <div class="row">
        <input type="submit" value="Submit">
    </div>
</form>
    