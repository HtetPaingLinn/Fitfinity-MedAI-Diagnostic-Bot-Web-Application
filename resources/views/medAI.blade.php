<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitFinity | MedAI Diagnostic Bot </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}"/>
    <style>
        * {
            font-size: x-large;
        }

        .wrap_img {
            position: relative;
            overflow: auto;
        }

        .frontBodyImage,
        .backBodyImage {
            margin: 0 auto;
        }

        .frontBodyImage {
            float: left;
        }

        .backBodyImage {
            position: absolute;
            right: 0;
            border: 2px solid green;
        }

        body {
            transform: scale(1); /* 80% of the original size */
            transform-origin: top center; /* Adjust the origin point if needed */
        }

        img {
            display: inline;
        }

    </style>
</head>
<script>
    window.onload = function() {
        document.body.style.zoom = "87%";
    };
</script>

<body class="bg-white flex w-full">
<div id="frontView" class="block wrap_img mt-9 w-1/2 ml-10 p-4">
    <img class="frontBodyImage" id="frontBodyImage" src="{{ Vite::asset('assets/images/body_img/human-body-front.png') }}" usemap="#front-image-map" alt="Human Body">

    <map name="front-image-map" class="front-image-map">
        <area id="headArea" target="" alt="Head" title="Head" href="" coords="176,76,180,73,181,86,189,94,203,99,216,98,226,93,234,86,234,74,240,75,244,65,244,52,237,53,237,32,232,21,223,12,213,8,201,8,189,13,181,22,177,32,177,45,177,53,171,51,170,58,172,68" shape="poly">
        <area id="neckArea" target="" alt="Neck" title="Neck" href="" coords="151,137,161,133,173,124,184,114,184,90,192,96,201,99,212,99,223,96,231,90,231,114,246,128,263,138,246,145,225,150,214,151,207,157,199,150,184,149,170,146" shape="poly">
        <area id="chestArea" target="" alt="Chest" title="Chest" href="" coords="198,150,207,157,214,151,243,149,267,152,275,157,280,166,280,178,275,198,266,214,253,224,230,228,207,225,184,228,163,225,149,215,140,197,134,171,136,162,143,154,155,151,175,149" shape="poly">
        <area id="abdomenArea" target="" alt="Abdomen" title="Abdomen" href="" coords="144,209,142,232,142,256,147,279,147,302,170,320,207,320,245,320,268,302,267,280,273,257,273,236,270,210,258,222,240,228,223,227,207,224,190,227,171,227,157,222" shape="poly">
        <area id="pelvisArea" target="" alt="Pelvis" title="Pelvis" href="" coords="246,320,233,321,197,321,168,320,148,302,144,322,143,348,152,354,171,376,182,391,187,404,193,418,201,427,208,430,214,428,223,418,229,398,237,384,257,361,273,346,271,336,271,318,267,303" shape="poly">
        <area id="thighsArea" target="" alt="Thighs" title="Thighs" href="" coords="161,363,184,394,193,419,202,428,212,428,222,418,231,395,245,373,272,344,281,381,283,413,288,445,285,490,274,542,276,573,261,573,246,575,232,579,219,503,210,453,210,430,204,429,204,456,195,504,182,578,167,573,152,570,138,569,140,541,130,490,127,445,131,413,133,384,142,347" shape="poly">
        <area id="leftKneeArea" target="" alt="Knees" title="Knees" href="" coords="138,570,139,589,138,611,147,615,158,616,173,614,177,608,179,591,182,579,167,574,153,571" shape="poly">
        <area id="rightKneeArea" target="" alt="Knees" title="Knees" href="" coords="233,579,236,593,238,610,243,615,256,615,267,612,277,609,276,573,263,573,247,575" shape="poly">
        <area id="leftLegArea" target="" alt="Legs" title="Legs" href="" coords="134,629,134,661,141,693,148,753,156,750,167,750,175,753,170,732,177,695,180,682,184,651,179,609,173,615,158,617,145,615,137,610" shape="poly">
        <area id="rightLegArea" target="" alt="Legs" title="Legs" href="" coords="238,610,232,635,230,661,244,729,242,744,239,755,248,752,259,753,267,758,267,743,275,689,281,652,281,622,277,610,257,615,242,615" shape="poly">
        <area id="leftAnkleArea" target="" alt="Ankles" title="Ankles" href="" coords="152,774,160,773,167,774,175,778,177,761,174,753,167,751,156,751,148,754,146,761,148,776" shape="poly">
        <area id="rightAnkleArea" target="" alt="Ankles" title="Ankles" href="" coords="237,762,240,777,246,774,252,773,259,774,267,778,269,768,268,759,259,753,248,752,240,755" shape="poly">
        <area id="leftFootArea" target="" alt="Feet" title="Feet" href="" coords="131,808,137,814,164,819,175,808,176,799,174,777,166,773,161,772,154,773,149,775,139,790,131,802" shape="poly">
        <area id="rightFootArea" target="" alt="Feet" title="Feet" href="" coords="240,778,246,775,252,774,259,775,267,779,274,789,283,801,283,807,280,814,251,819,240,810,238,799,240,787" shape="poly">
        <area id="leftShoulderArea" target="" alt="Shoulders" title="Shoulders" href="" coords="180,149,150,137,138,136,128,138,119,142,110,149,104,159,98,173,97,186,97,200,97,215,128,188,135,180,134,170,135,164,139,158,146,153,159,150" shape="poly">
        <area id="rightShoulderArea" target="" alt="Shoulders" title="Shoulders" href="" coords="235,149,259,139,275,136,290,139,302,147,311,159,316,169,318,181,318,196,318,206,317,215,293,193,280,180,280,165,275,157,266,152,249,150" shape="poly">
        <area id="leftArmArea" target="" alt="Arms" title="Arms" href="" coords="97,215,135,181,138,195,137,210,136,224,134,235,127,248,122,259,119,265,115,278,105,282,90,293,91,276,92,235" shape="poly">
        <area id="rightArmArea" target="" alt="Arms" title="Arms" href="" coords="279,180,318,216,323,232,324,250,323,262,323,276,325,294,311,283,299,277,294,261,280,233,277,205" shape="poly">
        <area id="leftForeArmArea" target="" alt="ForeArms" title="ForeArms" href="" coords="90,256,76,275,68,294,63,323,58,351,52,377,76,380,85,358,94,339,115,294,115,278,101,286,89,295,91,274" shape="poly">
        <area id="rightForeArmArea" target="" alt="ForeArms" title="ForeArms" href="" coords="324,256,333,268,340,280,346,297,351,314,354,336,357,351,363,377,339,380,332,365,306,306,300,292,300,278,311,283,325,295,323,275" shape="poly">
        <area id="leftWristArea" target="" alt="Wrists" title="Wrists" href="" coords="52,377,74,380,73,395,45,390" shape="poly">
        <area id="rightWristArea" target="" alt="Wrists" title="Wrists" href="" coords="339,380,362,377,369,389,342,394" shape="poly">
        <area id="leftHandArea" target="" alt="Hands" title="Hands" href="" coords="45,390,72,395,72,406,69,419,65,434,64,461,61,463,59,462,57,438,54,444,45,473,42,472,41,467,46,438,43,437,30,469,25,471,24,468,36,432,18,458,13,460,11,457,26,428,29,414,16,426,10,428,5,427,17,412,27,399,39,393" shape="poly">
        <area id="rightHandArea" target="" alt="Hands" title="Hands" href="" coords="342,395,368,390,375,393,385,397,395,407,400,416,409,427,406,429,398,425,387,415,389,429,404,457,400,460,392,451,381,434,379,436,386,456,390,469,388,471,381,464,371,437,368,438,373,471,370,473,366,464,361,443,359,438,356,439,356,451,355,463,352,463,350,459,349,431,344,415" shape="poly">
    </map>

    <!-- Switch Button to Back View -->
    <img id="toggleViewButton" class="bottom-2 right-2 left-2 w-20 cursor-pointer border-2 border-green-400 rounded hover:bg-green-200" src="{{ Vite::asset('assets/images/body_img/human-body-back.png') }} " alt="Switch to Back View">
</div>

<div id="backView" class="hidden mt-9 w-1/2 ml-10 p-4">
    <img id="backBodyImage" class="" src="{{ Vite::asset('assets/images/body_img/human-body-back.png') }}" usemap="#back-image-map" alt="Human Body">

    <map name="back-image-map">
        <area id="backHeadArea" target="" alt="Head" title="Head" href="" coords="174,74,170,57,171,51,177,51,177,38,180,26,187,16,194,11,208,8,219,11,231,18,238,34,238,51,245,51,245,61,241,75,234,76,225,78,212,81,203,81,191,79,180,76,174,74" shape="poly">
        <area id="backNeckArea" target="" alt="Neck" title="Neck" href="" coords="181,77,184,87,184,113,194,121,203,125,212,125,221,121,231,113,232,89,233,77,207,82" shape="poly">
        <area id="backBackArea" target="" alt="Back" title="Back" href="" coords="185,114,167,130,149,138,154,146,137,152,129,161,128,192,131,210,137,238,145,268,270,268,281,225,287,203,289,177,285,158,275,150,261,146,266,137,252,132,230,114,221,122,212,126,203,125,193,121" shape="poly">
        <area id="backLoinArea" target="" alt="Loin" title="Loin" href="" coords="270,268,268,279,268,300,272,318,272,341,246,341,223,354,208,378,193,354,169,340,144,342,144,319,148,304,148,280,145,268" shape="poly">
        <area id="backButtocksArea" target="" alt="Buttocks" title="Buttocks" href="" coords="144,342,135,376,132,414,129,427,143,442,158,451,180,451,197,442,205,433,211,433,220,443,232,449,248,453,267,447,278,435,286,425,281,391,279,366,271,342,245,341,225,354,216,366,208,378,200,364,186,350,168,341" shape="poly">
        <area id="backHamstringArea" target="" alt="Hamstrings" title="Hamstrings" href="" coords="129,428,127,441,130,484,135,517,141,542,139,586,151,566,161,534,164,565,178,597,185,560,193,514,202,476,205,434,210,433,213,476,223,517,229,556,238,597,249,573,255,534,266,570,277,587,274,541,281,516,285,487,287,460,288,436,285,425,273,442,255,452,238,452,221,444,210,433,205,434,192,445,179,452,165,452,153,450,140,440" shape="poly">
        <area id="backLeftKneeArea" target="" alt="Knees" title="Knees" href="" coords="153,563,148,574,157,588,168,576,164,564,161,536" shape="poly">
        <area id="backRightKneeArea" target="" alt="Knees" title="Knees" href="" coords="255,536,252,561,248,576,258,589,267,574,261,558" shape="poly">
        <area id="backLeftCalveArea" target="" alt="Calves" title="Calves" href="" coords="139,589,136,619,133,645,136,670,141,689,147,686,155,677,164,691,177,697,181,681,185,655,181,625,179,609,177,598,167,578,157,588,148,575" shape="poly">
        <area id="backRightCalveArea" target="" alt="Calves" title="Calves" href="" coords="248,578,238,596,237,612,233,630,231,654,233,674,238,698,252,690,259,675,267,686,275,688,278,674,282,648,279,614,276,588,268,575,258,589" shape="poly">
        <area id="backLeftAnkleArea" target="" alt="Ankles" title="Ankles" href="" coords="142,690,148,753,142,774,143,794,141,805,150,802,160,802,171,806,173,795,176,773,169,758,169,737,175,710,176,697,163,690,155,679" shape="poly">
        <area id="backRightAnkleArea" target="" alt="Ankles" title="Ankles" href="" coords="252,691,259,677,267,685,275,690,268,739,269,761,273,772,272,794,275,806,264,803,255,803,245,806,241,789,240,772,247,755,245,727,238,698" shape="poly">
        <area id="backLeftSoleArea" target="" alt="Soles" title="Soles" href="" coords="141,806,141,813,149,819,161,818,169,815,171,808,160,804,151,804" shape="poly">
        <area id="backRightSoleArea" target="" alt="Soles" title="Soles" href="" coords="245,808,246,815,255,818,265,819,274,814,275,806,264,803,255,804" shape="poly">
        <area id="backLeftFootArea" target="" alt="Feet" title="Feet" href="" coords="142,789,144,795,139,804,136,794" shape="poly">
        <area id="backRightFootArea" target="" alt="Feet" title="Feet" href="" coords="273,788,280,794,276,803,271,795" shape="poly">
        <area id="backLeftShoulderArea" target="" alt="Shoulders" title="Shoulders" href="" coords="149,137,155,146,142,149,129,161,127,183,116,195,98,214,97,189,99,169,108,153,119,142,136,137" shape="poly">
        <area id="backRightShoulderArea" target="" alt="Shoulders" title="Shoulders" href="" coords="266,137,261,146,270,148,281,154,287,164,289,182,318,215,318,172,309,155,297,143,283,137" shape="poly">
        <area id="backLeftArmArea" target="" alt="Arms" title="Arms" href="" coords="126,185,135,231,121,262,112,263,105,262,98,259,91,254,92,237,97,215" shape="poly">
        <area id="backRightArmArea" target="" alt="Arms" title="Arms" href="" coords="289,184,280,233,294,260,302,262,311,262,320,258,324,255,323,237,318,216" shape="poly">
        <area id="backLeftElbowArea" target="" alt="Elbows" title="Elbows" href="" coords="97,259,105,263,112,264,120,263,117,275,115,293,108,309,97,295,87,287,75,280,82,267,91,255" shape="poly">
        <area id="backRightElbowArea" target="" alt="Elbows" title="Elbows" href="" coords="295,261,302,263,311,263,320,259,324,255,333,267,340,280,328,288,319,295,307,308,301,295,299,277" shape="poly">
        <area id="backLeftForeArmArea" target="" alt="Forearms" title="Forearms" href="" coords="75,281,86,287,96,295,107,309,74,384,64,384,58,381,52,376,60,341,67,304" shape="poly">
        <area id="backRightForeArmArea" target="" alt="Forearms" title="Forearms" href="" coords="340,280,329,288,318,296,307,309,341,383,350,383,356,381,362,375,350,312,345,292" shape="poly">
        <area id="backLeftWristArea" target="" alt="Wrists" title="Wrists" href="" coords="52,377,57,381,64,385,74,385,72,409,67,401,61,396,51,392,43,392,49,385,52,377" shape="poly">
        <area id="backRightWristArea" target="" alt="Wrists" title="Wrists" href="" coords="362,376,356,382,350,384,341,384,343,405,348,400,355,395,361,393,372,392" shape="poly">
        <area id="backLeftHandArea" target="" alt="Hands" title="Hands" href="" coords="41,393,51,393,61,397,66,401,72,409,67,424,65,433,65,452,64,464,59,463,57,437,47,473,42,473,46,436,29,471,25,469,36,433,15,461,12,456,27,427,28,416,14,428,5,427,16,413,28,398" shape="poly">
        <area id="backRightHandArea" target="" alt="Hands" title="Hands" href="" coords="343,405,348,400,355,395,360,393,371,392,381,395,388,399,393,405,397,412,410,428,401,427,386,414,391,432,404,457,400,460,379,433,391,470,387,471,369,435,374,473,369,472,358,437,356,463,351,464,350,431" shape="poly">
    </map>

    <!-- Switch Button to Front View -->
    <img id="toggleViewButton" class="top-0 right-2 left-2 w-20 cursor-pointer border-2 border-green-400 rounded hover:bg-green-200" src="{{ Vite::asset('assets/images/body_img/human-body-front.png') }}" alt="Switch to Front View">
</div>


<div class="container mt-6 mr-6 w-[500px] bg-gray-50 md:w-3/5 p-3 rounded-lg shadow-md shadow-gray-400">
    <h3 class="text-lg font-bold text-center text-gray-700 pb-6">FitFinity MedAI</h3>
    <div class="w-full flex flex-row justify-center">
        <label for="bodyPart" class="block text-xs pr-1.5 pt-2 font-medium text-gray-700">Clicked area:</label>
        <div class="relative border-b-2 border-gray-400">
            <input type="text" id="bodyPart" class="pt-2 text-center text-xs text-gray-700 font-semibold bg-transparent focus:ring-0 focus:outline-none w-full" value="general" readonly>
        </div>
    </div>

    <form id="symptomForm" class="mt-4 mx-4 space-y-3">
        <div>
            <label for="symptom1" class="block text-xs font-medium text-gray-700">Symptom 1:</label>
            <select id="symptom1" name="symptom1" class="mt-1 block w-full py-1.5 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary text-xs">
                <option value=""> -- Select Symptom 1 -- </option>
            </select>
        </div>

        <div>
            <label for="symptom2" class="block text-xs font-medium text-gray-700">Symptom 2:</label>
            <select id="symptom2" name="symptom1" class="mt-1 block w-full py-1.5 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary text-xs">
                <option value=""> -- Select Symptom 2 -- </option>
            </select>
        </div>

        <div>
            <label for="symptom3" class="block text-xs font-medium text-gray-700">Symptom 3:</label>
            <select id="symptom3" name="symptom1" class="mt-1 block w-full py-1.5 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary text-xs">
                <option value=""> -- Select Symptom 3 -- </option>
            </select>
        </div>

        <button type="button" onclick="predictDisease()" class="px-2 py-1 bg-green-500 text-white rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">Predict Disease</button>
    </form>

    <div id="result" class="mt-4 mx-4 space-y-4"></div>
</div>


<script>
    <?php
    $filename = __DIR__ . DIRECTORY_SEPARATOR . 'Prolog/new_disease.pl';
    $fileContents = file_get_contents($filename);

    if ($fileContents === false) {
        die("Error: Unable to open the file at $filename");
    }

    $lines = explode("\n", $fileContents);
    $diseases = [];
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || !preg_match('/^disease\(([^,]+), ([^,]+), \[([^\]]+)\], (\d+), ([^,]+)\)\.$/', $line, $matches)) {
            continue;
        }
        $name = $matches[1];
        $bodyPart = $matches[2];
        $symptoms = explode(', ', $matches[3]);
        $confidence = intval($matches[4]);
        $speciality = $matches[5];

        if (!isset($diseases[$bodyPart])) {
            $diseases[$bodyPart] = [];
        }

        $diseases[$bodyPart][] = [
            'name' => $name,
            'symptoms' => $symptoms,
            'confidence' => $confidence,
            'speciality' => $speciality
        ];
    }

    echo "const diseases = " . json_encode($diseases, JSON_PRETTY_PRINT) . ";\n";
    ?>


    document.querySelectorAll('area').forEach(function(area) {
        area.addEventListener('click', function(event) {
            event.preventDefault();
            const bodyPart = this.title.toLowerCase();
            document.getElementById('bodyPart').value = bodyPart;

            resetSymptomSelectors();
            populateSymptomOptions(bodyPart, 0, 'symptom1');
        });
    });

    // Event listener for clicking outside a body part to reset to "general"
    document.addEventListener('click', function(event) {
        if (!event.target.closest('area') && !event.target.closest('select')) {
            document.getElementById('bodyPart').value = "general";
            resetSymptomSelectors();
            populateSymptomOptions('general', 0, 'symptom1');
        }
    });

    document.getElementById('symptom1').addEventListener('change', function() {
        const bodyPart = document.getElementById('bodyPart').value.toLowerCase();
        const selectedSymptom1 = this.value;

        resetSymptomSelectors(2);
        if (selectedSymptom1) {
            populateSymptomOptions(bodyPart, 1, 'symptom2', selectedSymptom1);
        }
    });

    document.getElementById('symptom2').addEventListener('change', function() {
        const bodyPart = document.getElementById('bodyPart').value.toLowerCase();
        const selectedSymptom1 = document.getElementById('symptom1').value;
        const selectedSymptom2 = this.value;

        resetSymptomSelectors(3);
        if (selectedSymptom2) {
            populateSymptomOptions(bodyPart, 2, 'symptom3', selectedSymptom1, selectedSymptom2);
        }
    });

    function resetSymptomSelectors(startIndex = 1) {
        for (let i = startIndex; i <= 3; i++) {
            const selectElement = document.getElementById(`symptom${i}`);
            selectElement.innerHTML = `<option value="">--Select Symptom ${i}--</option>`;
            selectElement.disabled = true;
        }
    }

    function populateSymptomOptions(bodyPart, position, selectId, ...previousSymptoms) {
        const selectElement = document.getElementById(selectId);
        selectElement.innerHTML = `<option value="">--Select Symptom ${position + 1}--</option>`;
        const symptomSet = new Set();

        diseases[bodyPart].forEach(disease => {
            const symptomsMatch = previousSymptoms.every(symptom => disease.symptoms.includes(symptom));
            if (symptomsMatch) {
                disease.symptoms.forEach(symptom => {
                    if (!previousSymptoms.includes(symptom)) {
                        symptomSet.add(symptom);
                    }
                });
            }
        });

        symptomSet.forEach(symptom => {
            const option = document.createElement('option');
            option.value = symptom;
            option.textContent = symptom.replace(/_/g, ' ');
            selectElement.appendChild(option);
        });

        selectElement.disabled = symptomSet.size === 0;
    }

    function predictDisease() {
        const bodyPart = document.getElementById('bodyPart').value.toLowerCase();
        const selectedSymptom1 = document.getElementById('symptom1').value;
        const selectedSymptom2 = document.getElementById('symptom2').value;
        const selectedSymptom3 = document.getElementById('symptom3').value;
        const symptomsArray = [selectedSymptom1, selectedSymptom2, selectedSymptom3];

        const encodedSymptoms = encodeURIComponent(JSON.stringify(symptomsArray));

        const results = diseases[bodyPart].filter(disease => {
            return (!selectedSymptom1 || disease.symptoms.includes(selectedSymptom1)) &&
                (!selectedSymptom2 || disease.symptoms.includes(selectedSymptom2)) &&
                (!selectedSymptom3 || disease.symptoms.includes(selectedSymptom3));
        });

        let output = "";
        if (results.length > 0) {
            results.forEach(result => {
                const confidence = result.confidence;
                let confidenceText = "Fair";
                let confidenceColor = "bg-yellow-400";

                if (confidence > 85) {
                    confidenceText = "High";
                    confidenceColor = "bg-red-500";
                } else if (confidence >= 80) {
                    confidenceText = "Moderate";
                    confidenceColor = "bg-orange-500";
                }

                output += `
            <div class="px-5 py-3 bg-white rounded-lg shadow-md border border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xs font-semibold text-gray-900">${result.name.replace(/_/g, ' ')}</h3>
                    <a href='/choose_doctor?disease=${encodeURIComponent(result.name.replace(/_/g, ' '))}&symptoms=${encodedSymptoms}&speciality=${result.speciality}' class="px-4 py-0.5 mt-1 bg-green-500 text-white rounded-md text-xs hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Find doctor
                    </a>
                </div>
                <div class="mt-2 text-xs text-gray-600">
                    Confidence Level: <span class="font-semibold ml-2.5 text-xs text-gray-900">${confidenceText}</span>
                </div>
                <div class="w-full bg-gray-300 rounded-full h-2 mt-1">
                    <div class="h-2 rounded-full ${confidenceColor}" style="width: ${confidence}%;"></div>
                </div>
            </div>
            `;
            });
        } else {
            output = "<p class='text-red-500'>No matching diseases.pl found.</p>";
        }

        document.getElementById('result').innerHTML = output;
    }
</script>

<!-- Code for Front View of Human Body -->
<!-- Hover Effect -->
<script>
    const frontBodyImage = document.getElementById('frontBodyImage');
    const areas = {
        head: 'headArea',
        neck: 'neckArea',
        chest: 'chestArea',
        abdomen: 'abdomenArea',
        pelvis: 'pelvisArea',
        thighs: 'thighsArea',
        leftKnee: 'leftKneeArea',
        rightKnee: 'rightKneeArea',
        leftLeg: 'leftLegArea',
        rightLeg: 'rightLegArea',
        leftAnkle: 'leftAnkleArea',
        rightAnkle: 'rightAnkleArea',
        leftFoot: 'leftFootArea',
        rightFoot: 'rightFootArea',
        leftShoulder: 'leftShoulderArea',
        rightShoulder: 'rightShoulderArea',
        leftArm: 'leftArmArea',
        rightArm: 'rightArmArea',
        leftForeArm: 'leftForeArmArea',
        rightForeArm: 'rightForeArmArea',
        leftWrist: 'leftWristArea',
        rightWrist: 'rightWristArea',
        leftHand: 'leftHandArea',
        rightHand: 'rightHandArea',
    };

    const highlightedImages = {
        head: "{{ Vite::asset('assets/images/body_img/front-head-selected.png') }}",
        neck: "{{ Vite::asset('assets/images/body_img/front-neck-selected.png') }}",
        chest: "{{ Vite::asset('assets/images/body_img/front-chest-selected.png') }}",
        abdomen: "{{ Vite::asset('assets/images/body_img/front-abdomen-selected.png') }}",
        pelvis: "{{ Vite::asset('assets/images/body_img/front-pelvis-selected.png') }}",
        thighs: "{{ Vite::asset('assets/images/body_img/front-thighs-selected.png') }}",
        knees: "{{ Vite::asset('assets/images/body_img/front-knees-selected.png') }}",
        legs: "{{ Vite::asset('assets/images/body_img/front-legs-selected.png') }}",
        ankles: "{{ Vite::asset('assets/images/body_img/front-ankles-selected.png') }}",
        feet: "{{ Vite::asset('assets/images/body_img/front-feet-selected.png') }}",
        shoulders: "{{ Vite::asset('assets/images/body_img/front-shoulders-selected.png') }}",
        arms: "{{ Vite::asset('assets/images/body_img/front-arms-selected.png') }}",
        foreArms: "{{ Vite::asset('assets/images/body_img/front-fore-arms-selected.png') }}",
        wrists: "{{ Vite::asset('assets/images/body_img/front-wrists-selected.png') }}",
        hands: "{{ Vite::asset('assets/images/body_img/front-hands-selected.png') }}",
    };

    const defaultImage = "{{ Vite::asset('assets/images/body_img/human-body-front.png') }}";

    // Preload the highlighted images
    Object.values(highlightedImages).forEach(src => {
        const img = new Image();
        img.src = src;
    });

    function changeImage(newSrc) {
        frontBodyImage.src = newSrc;
    }

    function addHoverListeners(area, imageKey) {
        const element = document.getElementById(areas[area]);
        if (element) {
            element.addEventListener('mouseenter', () => changeImage(highlightedImages[imageKey]));
            element.addEventListener('mouseleave', () => changeImage(defaultImage));
        }
    }

    // Add event listeners
    addHoverListeners('head', 'head');
    addHoverListeners('neck', 'neck');
    addHoverListeners('chest', 'chest');
    addHoverListeners('abdomen', 'abdomen');
    addHoverListeners('pelvis', 'pelvis');
    addHoverListeners('thighs', 'thighs');
    addHoverListeners('leftKnee', 'knees');
    addHoverListeners('rightKnee', 'knees');
    addHoverListeners('leftLeg', 'legs');
    addHoverListeners('rightLeg', 'legs');
    addHoverListeners('leftAnkle', 'ankles');
    addHoverListeners('rightAnkle', 'ankles');
    addHoverListeners('leftFoot', 'feet');
    addHoverListeners('rightFoot', 'feet');
    addHoverListeners('leftShoulder', 'shoulders');
    addHoverListeners('rightShoulder', 'shoulders');
    addHoverListeners('leftArm', 'arms');
    addHoverListeners('rightArm', 'arms');
    addHoverListeners('leftForeArm', 'foreArms');
    addHoverListeners('rightForeArm', 'foreArms');
    addHoverListeners('leftWrist', 'wrists');
    addHoverListeners('rightWrist', 'wrists');
    addHoverListeners('leftHand', 'hands');
    addHoverListeners('rightHand', 'hands');
</script>


<!-- Code for Back View of Human Body -->
<!-- Hover Effect -->
<script>
    const backBodyImage = document.getElementById('backBodyImage');
    const backHeadArea = document.getElementById('backHeadArea');
    const backNeckArea = document.getElementById('backNeckArea');
    const backBackArea = document.getElementById('backBackArea');
    const backLoinArea = document.getElementById('backLoinArea');
    const backButtocksArea = document.getElementById('backButtocksArea');
    const backHamstringArea = document.getElementById('backHamstringArea');
    const backLeftKneeArea = document.getElementById('backLeftKneeArea');
    const backRightKneeArea = document.getElementById('backRightKneeArea');
    const backLeftCalveArea = document.getElementById('backLeftCalveArea');
    const backRightCalveArea = document.getElementById('backRightCalveArea');
    const backLeftAnkleArea = document.getElementById('backLeftAnkleArea');
    const backRightAnkleArea = document.getElementById('backRightAnkleArea');
    const backLeftSoleArea = document.getElementById('backLeftSoleArea');
    const backRightSoleArea = document.getElementById('backRightSoleArea');
    const backLeftFootArea = document.getElementById('backLeftFootArea');
    const backRightFootArea = document.getElementById('backRightFootArea');
    const backLeftShoulderArea = document.getElementById('backLeftShoulderArea');
    const backRightShoulderArea = document.getElementById('backRightShoulderArea');
    const backLeftArmArea = document.getElementById('backLeftArmArea');
    const backRightArmArea = document.getElementById('backRightArmArea');
    const backLeftElbowArea = document.getElementById('backLeftElbowArea');
    const backRightElbowArea = document.getElementById('backRightElbowArea');
    const backLeftForeArmArea = document.getElementById('backLeftForeArmArea');
    const backRightForeArmArea = document.getElementById('backRightForeArmArea');
    const backLeftWristArea = document.getElementById('backLeftWristArea');
    const backRightWristArea = document.getElementById('backRightWristArea');
    const backLeftHandArea = document.getElementById('backLeftHandArea');
    const backRightHandArea = document.getElementById('backRightHandArea');

    // Paths to the highlighted images
    const highlightedBackHeadImage = "{{ Vite::asset('assets/images/body_img/back-head-selected.png') }}";
    const highlightedBackNeckImage = "{{ Vite::asset('assets/images/body_img/back-neck-selected.png') }}";
    const highlightedBackBackImage = "{{ Vite::asset('assets/images/body_img/back-back-selected.png') }}";
    const highlightedBackLoinImage = "{{ Vite::asset('assets/images/body_img/back-loin-selected.png') }}";
    const highlightedBackButtocksImage = "{{ Vite::asset('assets/images/body_img/back-buttocks-selected.png') }}";
    const highlightedBackHamstringImage = "{{ Vite::asset('assets/images/body_img/back-hamstrings-selected.png') }}";
    const highlightedBackKneesImage = "{{ Vite::asset('assets/images/body_img/back-knees-selected.png') }}";
    const highlightedBackCalvesImage = "{{ Vite::asset('assets/images/body_img/back-calves-selected.png') }}";
    const highlightedBackAnklesImage = "{{ Vite::asset('assets/images/body_img/back-ankles-selected.png') }}";
    const highlightedBackSolesImage = "{{ Vite::asset('assets/images/body_img/back-soles-selected.png') }}";
    const highlightedBackFeetImage = "{{ Vite::asset('assets/images/body_img/back-feet-selected.png') }}";
    const highlightedBackShouldersImage = "{{ Vite::asset('assets/images/body_img/back-shoulders-selected.png') }}";
    const highlightedBackArmsImage = "{{ Vite::asset('assets/images/body_img/back-arms-selected.png') }}";
    const highlightedBackElbowsImage = "{{ Vite::asset('assets/images/body_img/back-elbows-selected.png') }}";
    const highlightedBackForeArmsImage = "{{ Vite::asset('assets/images/body_img/back-fore-arms-selected.png') }}";
    const highlightedBackWristsImage = "{{ Vite::asset('assets/images/body_img/back-wrists-selected.png') }}";
    const highlightedBackHandsImage = "{{ Vite::asset('assets/images/body_img/back-hands-selected.png') }}";

    // Path to the default image
    const defaultBackImage = "{{ Vite::asset('assets/images/body_img/human-body-back.png') }}";

    function setHoverEffects(area, highlightedImage) {
        area.addEventListener('mouseover', function() {
            backBodyImage.src = highlightedImage;
        });
        area.addEventListener('mouseout', function() {
            backBodyImage.src = defaultBackImage;
        });
    }

    // Set hover effects for back view
    setHoverEffects(backHeadArea, highlightedBackHeadImage);
    setHoverEffects(backNeckArea, highlightedBackNeckImage);
    setHoverEffects(backBackArea, highlightedBackBackImage);
    setHoverEffects(backLoinArea, highlightedBackLoinImage);
    setHoverEffects(backButtocksArea, highlightedBackButtocksImage);
    setHoverEffects(backHamstringArea, highlightedBackHamstringImage);
    setHoverEffects(backLeftKneeArea, highlightedBackKneesImage);
    setHoverEffects(backRightKneeArea, highlightedBackKneesImage);
    setHoverEffects(backLeftCalveArea, highlightedBackCalvesImage);
    setHoverEffects(backRightCalveArea, highlightedBackCalvesImage);
    setHoverEffects(backLeftAnkleArea, highlightedBackAnklesImage);
    setHoverEffects(backRightAnkleArea, highlightedBackAnklesImage);
    setHoverEffects(backLeftSoleArea, highlightedBackSolesImage);
    setHoverEffects(backRightSoleArea, highlightedBackSolesImage);
    setHoverEffects(backLeftFootArea, highlightedBackFeetImage);
    setHoverEffects(backRightFootArea, highlightedBackFeetImage);
    setHoverEffects(backLeftShoulderArea, highlightedBackShouldersImage);
    setHoverEffects(backRightShoulderArea, highlightedBackShouldersImage);
    setHoverEffects(backLeftArmArea, highlightedBackArmsImage);
    setHoverEffects(backRightArmArea, highlightedBackArmsImage);
    setHoverEffects(backLeftElbowArea, highlightedBackElbowsImage);
    setHoverEffects(backRightElbowArea, highlightedBackElbowsImage);
    setHoverEffects(backLeftForeArmArea, highlightedBackForeArmsImage);
    setHoverEffects(backRightForeArmArea, highlightedBackForeArmsImage);
    setHoverEffects(backLeftWristArea, highlightedBackWristsImage);
    setHoverEffects(backRightWristArea, highlightedBackWristsImage);
    setHoverEffects(backLeftHandArea, highlightedBackHandsImage);
    setHoverEffects(backRightHandArea, highlightedBackHandsImage);
</script>


<!-- Toggle Button >>> Switching Sides -->
<script>
    const frontView = document.getElementById('frontView');
    const backView = document.getElementById('backView');
    const toggleButton = document.querySelectorAll('#toggleViewButton');

    toggleButton.forEach(button => {
        button.addEventListener('click', function() {
            if (frontView.style.display === 'none' || frontView.style.display === '') {
                frontView.style.display = 'block';
                backView.style.display = 'none';
                toggleButton[0].src = '{{ Vite::asset('assets/images/body_img/human-body-back.png') }}'; // Set image to back view on switch
                toggleButton[1].src = '{{ Vite::asset('assets/images/body_img/human-body-back.png') }}';
            } else {
                frontView.style.display = 'none';
                backView.style.display = 'block';
                toggleButton[0].src = '{{ Vite::asset('assets/images/body_img/human-body-front.png') }}'; // Set image to front view on switch
                toggleButton[1].src = '{{ Vite::asset('assets/images/body_img/human-body-front.png') }}';
            }
        });
    });

</script>

</body>
</html>
