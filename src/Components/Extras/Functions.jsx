export const getGenderOptions = () => {
    return [
        { label: 'Male', value: 'Male' },
        { label: 'Female', value: 'Female' }
    ];
}
export const getTitleOptions = () => {
    return [
        { label: 'Mr.', value: 'Mr.' },
        { label: 'Mrs.', value: 'Mrs.' },
        { label: 'Ms.', value: 'Ms.' },
        { label: 'Prof.', value: 'Prof.' },
        { label: 'Dr.', value: 'Dr.' }
    ];
}
export const getBranchOptions = () => {
    return [
        { label: 'Amasaman.', value: 'Amasaman.' },
        { label: 'East Legon', value: 'East Legon' },
        { label: 'Kasoa', value: 'Kasoa' },
        { label: 'Korle Bu', value: 'Korle Bu' }
    ];
}
export const getDate = () => {
    return new Date();
}
export const getMaxDate = () => {
    const date  = getDate();
    const day   = date.getDate();
    const month = date.getMonth() < 10 ? '0'+(1+date.getMonth()) : (1+date.getMonth());
    const year  = date.getFullYear();
    
    return year+'-'+month+'-'+day;
}
export const toCapitalCase = (string) => {
    const array    = string.split(' ');
    let new_string = '';

    for (var index = 0; index < array.length; index++) {
        const first_letter = array[index].substr(0, 1);
        const remaining    = array[index].substr(1, array[index].length);
        new_string         = first_letter.toUpperCase() + remaining.toLowerCase();
    }

    return new_string.trim();
}
export const get_total_amount = (array) => {
    let total_amount = 0.00;
    array.forEach(value => {
        total_amount += +value['amount'];
    });
    
    return total_amount;
}
export const isPrefixValid = (number) => {
    const prefixes = ["020", "023", "024", "026", "027", "028", "029", "030", "030", "031", "032", "050", "054", "055", "056", "057"];

    return prefixes.includes(number);
}
export const pop_first_comma = (array) => {
    if(array[0] === '' || array[0].length === 0) {
        return array.slice(1);
    }

    return array;
}

export const get_age = (birth_month, birth_day, birth_year) => {
    let todays_date = new Date();
    let today_year  = todays_date.getFullYear();
    let today_month = todays_date.getMonth();
    let today_day   = todays_date.getDate();
    let age         = today_year - birth_year;

    if(today_month < (birth_month - 1)) {
        age--;
    }
    if(((birth_month - 1) === today_month) && (today_day < birth_day)) {
        age--;
    }

    return age;
}

export const get_branches = () => {
    return ["Amasaman", "East Legon", "Kasoa", "Korle Bu"];
}

export const get_months_short = () => {
    return ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
}

export const get_months_full = () => {
    return ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
}

export const get_todays_date = () => {
    const months = get_months_short();
	const date   = new Date();
    // return months[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
    return date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear();
}

export const get_todays_date_full = () => {
    const months  = get_months_full();
    const date    = new Date();
    const day     = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();
    const hours   = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours();
    const minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes();
    const seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
    return day + ' ' + months[date.getMonth()] + ' ' + date.getFullYear() + ' - ' + hours + ':' + minutes + ':' + seconds;
    // return months[date.getMonth()] + ' ' + day + ', ' + date.getFullYear() + ' - ' + hours + ':' + minutes + ':' + seconds;
}

export const get_current_year = () => {
	const date = new Date();
    return date.getFullYear().toString();
}

export const get_roles_options = () => {
    return ["Administrator", "Front Desk", "Lab Technician"];
}

export const get_gender_options = () => {
    return ['Male', 'Female', 'Transgender'];
}

export const get_title_options = () => {
    return ['Mr', 'Mrs', 'Ms', 'Prof', 'Dr'];
}

export const get_blood_group_options = () => {
    return ['A', 'B', 'O', 'AB'];
}

export const get_rhesus_options = () => {
    return ['Positive', 'Negative'];
}

export const get_retro_screen_options = () => {
    return ['Reactive', 'Non-Reactive'];
}

export const get_gram_stain_options = () => {
    return ['No Organism Seen', 'GNID Present', 'No GNID Seen',
        'Gram +ve Cocci Seen', 'Gram -ve Cocci Seen',
        'Gram +ve Bacilli Seen', 'Gram -ve Bacilli Seen'];
}

export const get_gram_reaction_options = () => {
    return ['Gram +ve Cocci Seen', 'Gram -ve Cocci Seen',
        'Gram +ve Bacilli Seen', 'Gram -ve Bacilli Seen', 'Gram +ve Diplococci'];
}

export const get_t_vaginalis_options = () => {
    return ['Not Seen', 'Present(+)', 'Present(2+)', 'Present(3+)', 'Nil', 'Present'];
}

export const get_crystals_options = () => {
    return ['Not Seen', 'Present(+)', 'Present(2+)', 'Present(3+)', 'Nil', 'Present', 'Calcium Oxalate'];
}

export const get_cast_options = () => {
    return ['Not Seen', 'Present(+)', 'Present(2+)', 'Present(3+)', 'Nil', 'Present', 'Cellular Cast(+)', 'Cellular Cast(++)', 'Granullar Cast(++)'];
}

export const get_zn_stain_options = () => {
    return ['AFB Present', 'No AFB Present'];
}

export const get_fungal_element_stain_options = () => {
    return ['No Fungal Element Seen', 'Fungal Element Present',
        'Yeast-Like Cells Present', 'No Yeast-Like Cells Seen',
        'Yeast-Like Cells Present (+)', 'Yeast-Like Cells Present (2+)',
        'Yeast-Like Cells Present (3+)', 'Yeast-Like Cells Present (4+)'];
}

export const get_colour_options = () => {
    return ['Clear', 'Colourless', 'Normal Clear'];
}

export const get_colour_two_options = () => {
    return ['Amber', 'Coffee Ground', 'Colourless', 'Deep Amber', 'Deep Yellow', 'Light Amber', 'Others', 'Pot Wine', 'Straw', 'Yellow'];
}

export const get_culture_options = () => {
    return ['No Bacterial Growth', 'No Significant Growth',
        'Normal Flora Only', 'Bacterial Colonisation',
        'Heavily Mixed Growth, Please Repeat', 'Strept/ (Other than group A)',
        'No Salmonella or Shigella Isolated', 'Commensals Only',
        'Normal Flora/Commensals Only', 'Preliminary Report: No Bacteria Growth after 48hrs',
        'Final Report: No Bacteria Growth after 7days', 'No Bacteria Growth after 14days', 'Candida SPP Isolated', 'Bacillus SPP', 'No Bacteria Growth after 21days', 'Bactec incubation. No Bacteria Growth after 5days'];
}

export const get_culture_options_two = () => {
    return ['Beta Haemolitic Strept Isolated', 'No Beta Haemolitic Strept Isolated', 'No Bacterial Growth', 'No Significant Growth',
        'Normal Flora Only', 'Bacterial Colonisation',
        'Heavily Mixed Growth, Please Repeat', 'Strept/ (Other than group A)',
        'No Salmonella or Shigella Isolated', 'Commensals Only',
        'Normal Flora/Commensals Only', 'Preliminary Report: No Bacteria Growth after 48hrs',
        'Final Report: No Bacteria Growth after 7days', 'No Bacteria Growth after 14days', 'Candida SPP Isolated', 'Bacillus SPP', 'No Bacteria Growth after 21days', 'Bactec incubation. No Bacteria Growth after 5days'];
}

export const get_bacteria_options = () => {
    return ['Acinetobacter SPP', 'Alcaligenes', 'Alpha Haem. Strept', 'Anaerobic Strept', 'Aspergillus', 'Bacillus SPP', 'Bacteriodes SPP', 'Beta Haem. STrept', 'Brucella SPP', 'C. Diphtheriae', 'C. Perfringes',
        'Campylobacter SPP', 'Candida SPP', 'Citrobacter Diversus', 'Citrobacter Freundii', 'Citrbacter SPP', 'Coliform', 'Cryptococcus Cells', 'E. Coli', 'Enterobacter SPP', 'Enterobacteria', 'Enterobacteria SPP', 'Enterococcus SPP',
        'Enterococcus Faecalis', 'F. Meningosepticum', 'Fungal Elements', 'Ganella Morbillorum', 'H. Influenzae', 'K. Pneumoniae', 'Klebsiella Oxytoca', 'Klebsiella SPP', 'Lactobacilli', 'Listeria SPP', 'M. Catarrhalis', 'M. Tuberculosis',
        'Morganella SPP', 'N. Gonorrhoea', 'N. Meningitides', 'Non Haem. Strept', 'P. Aeruginosa', 'Pantoea SPP', 'Pasteurella SPP', 'Protea Mirabilis', 'Proteus SPP', 'Proteus Vulgaris', 'Providencia Rettgeri', 'Providentia SPP', 'Pseudomonas SPP', 'Salmonella Enteridis', 'Salmonella Paratyphi {A}', 'Salmonella Paratyphi {B}', 'Salmonella Paratyphi {C}', 'Salmonella SPP', 'Salmonella Typhi', 'Salmonella Typhimurium', 'Serratia', 'Shigella Boydi', 'Shigella Dysentry', 'Shigella Flexneri', 'Shigella Sonnei', 'Shigella SPP', 'Staph Aureus', 'Staph Epidermis', 'Srept Faecalis', 'Srept Faecium', 'Srept Pneumoniae', 'Srept Pyogenes', 'Srept Viridans', 'Srept. Agalactiae', 'Srept. Faecalis', 'Srept. Pyogenes', 'Vincents Organism', 'Yeast-like Cells', 'Yersinia Pestis'];
}

export const get_antibiotics_options = () => {
    return ['Amikacin', 'Ampicillin', 'Amoxiclav', 'Amoxicillin', 'Aztrenem', 'Cefepim', 'Cefixim', 'Cefotaxime', 'Cefoxitin', 'Cefpirom', 'Ceftazidime', 'Ceftriaxone', 'Cefuroxime', 'Cephalothin',
        'Chloramphenicol', 'Ciprofloxacin', 'Cloxacillin', 'Cotrimoxazol', 'Erythromycin', 'Flucloxacillin', 'Fosfomycin', 'Gentamicin', 'Levoflxacillin',  'Imipenem', 'Iperracillin', 'Isepamicin', 'Meropenem', 'Nalidixic Acid', 'Netilmicin', 'Nitrofuratoin', 'Norfloxacin', 'Pefloxacin', 'Penincillin', 'Tetracycline',
        'Ticarcillin', 'Tobramycin', 'Urotractin'];
}

export const get_roles = () => {
    return ["Can Create Lab","Can Edit Lab","Can View Lab","Can Pay Lab","Can View Lab List",
            "Can Create Charge","Can Edit Charge","Can View Charges List",
            "Can Create Patient","Can Edit Patient","Can View Patient","Can View Patients List","Can Create Reports",
            "Can Create Staff","Can Edit Staff","Can View Staff","Can View Staff List","Can Block Staff","Can Unblock Staff"
           ];//.sort();
}

export const get_appearances = () => {
    return ["Blood Stain", "Bloody", "Clear", "Clear and Colourless", "Cloudy", "Hazy", "Slightly Turbid", "Turbid", "Xanthochromic"];
}

export const get_appearances_two = () => {
    return ["Blood Stained", "Mucopurulent", "Purulent", "Salivary"];
}

export const get_ph_options = () => {
    return ["5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0"];
}

export const get_consistency_options = () => {
    return ["Normal", "Incomplete Liquefaction", "Complete Liquefaction"];
}

export const get_widal_options = () => {
    // return ["Less Than 1/20", "1/20", "1/40", "1/60", "1/80", "1/160", "1/320", "More Than 1/320"];
    return ["<1/20", "1/20", "1/40", "1/60", "1/80", "1/160", "1/320", ">1/320"];
}

export const get_semen_ph_options = () => {
    return ["5.0", "5.5", "6.0", "6.5", "7.0",
        "7.5", "8.0", "8.5", "9.0", "9.5", "10.0", "10.5",
        "11.0", "11.5", "12.0"];
}

export const get_semen_colour = () => {
    return ["Blood Stain", "Bloody", "Cream", "Gray", "White"];
}
export const get_specific_gravity_options = () => {
    return ["1.0000", "1.0005", "1.00010", "1.0015", "1.0020", "1.0025", "1.0030"];
}
export const get_protein = () => {
    return ["Negative", "Present(+)", "Present(2+)", "Present(3+)", "Present(4+)", "Trace"];
}

export const get_urobilinogen_options = () => {
    return ["Increased (+)", "Increased (2+)", "Increased (3+)", "Increased (4+)", "Normal"];
}

export const get_globulins = () => {
    return ["Negative", "Present(+2)", "Present(+3)", "Present(+4)", "Present(+)", "Trace"];
}

export const get_pus_cells_options = () => {
    return ["No Pus Cells Seen", "Present(+)", "Present(+2)", "Present(+3)"];
}

export const get_larvae_options = () => {
    return ["Not Seen", "Strongyloides Sterocoralis Present"];
}

export const get_vegetative_form_options = () => {
    return ["Intestinal Flagellates Present", "Giardia Lamblia Present", "Entamoeba Histolytica Present", "Yeast-Like Cells Present", "Yeast-Like Cells Present(+)", "Yeast-Like Cells Present(2+)", "Yeast-Like Cells Present(3+)", "Yeast-Like Cells Present(4+)", "Not Seen"];
}

export const get_cyst_options = () => {
    return ["Endolimax Nana", "Entamoeba Coli", "Giardia Lamblia", "Entamoeba Histolytica", "Entamoeba Hominis", "Retortamonas Intestinalis", "Not Seen"];
}

export const get_abo_grouping_options = () => {
    return ["A Positive", "A Negative",
    "B Positive", "B Negative",
    "AB Positive", "AB Negative",
    "O Positive", "O Negative",];
}

export const get_g6pd_options = () => {
    return ["Normal", "Partial Defect", "Full Defect"];
}

export const get_hgb_genetype_options = () => {
    return ["AA", "AC", "AF", "AS", "CC", "SC", "SF", "SS", "SS&F", "SS/SD"];
}

export const get_stool_re_first_row_first_column_options = () => {
    return ["Formed Specimen", "Semi-Formed Specimen", "Loose Specimen", "Mucoid Specimen", "WaterySpecimen", "Blood Stained Specimen", "Bloody Specimen"];
}

export const get_stool_re_second_row_first_column_options = () => {
    return ["Not Seen", "Ascaris Lumbricoides Present", "Clonorchis Sinesis Present", "Diphyllobothrium Latum Present", "Fasciola Hepatica Present", "Hookworm Present",
        "Hymenolepis Diminuta Present", "Hymenolepis Nana Present", "Metagonimus Yokogawa Present", "Paragonimus Westermani Present", "Schistosoma Japonicum Present", "Schistosoma Mansoni Present", "Taenia SPP Present", "Ternidens Deminutus Present",
        "Trichostrongyle Present", "Trichuris Trichiura Present"
    ];
}

export const get_stool_re_all_fourth_column_options = () => {
    return ["Not Seen", "Present(+)", "Present(+2)", "Present(+3)", "Present(+4)", "Pigment"];
}

export const get_lab_types = () => {
    return ["Alpha Feto Protein", "Antenatal Screening", "Ascitic Fluid C/S", "Aspirate C/S", "BUE + Creatinine"
    , "BUE Creatinine + eGFR", "BUE + LFT", "BUE + Lipids", "Blood Film Comment", "Blood C/S", "Blood Sugar", "C-Reactive Protein"
    , "CA-12.5", "CA-15.3", "CD4 Count", "CEA", "CKMB", "CRP", "CRP Ultra-Sensitive", "CSF Biochem", "Calcium Profile"
    , "Cardiac Enzyme", "Clotting Profile", "Compact Chemistry", "Cortisol", "D-Dimers", "ESR", "Ear Swab C/S"
    , "Endocervical Swab C/S", "Estrogen", "Eye Swab C/S", "FBC 3P", "FBC 5P", "FBC Children", "Folate / B12"
    , "General Chemistry", "HBA1C", "H. Pylori Ag.", "H. Pylori Ag. / SOB", "H. Pylori Ag. Blood", "HBV Viral Load"
    , "HIV Viral Load", "Hepatitis B Profile", "Hepatitis Markers", "HVS C/S", "HVS R/E", "Hormonal Assay", "Hypersensitive CPR"
    , "ISE", "Iron Study", "LFT", "Lipid Profile", "Mantoux", "M-ALB", "NTC - Screening", "PSA", "PTH", "Pleural Fluid"
    , "Pregnancy Test", "Protein Electrophoresis", "Pus Fluid", "Reproductive Assay", "Rheumatology", "S-C3, S-C4", "Semen Analysis"
    , "Semen C/S", "Serum HCG", "Serum Lipase", "Skin Snip", "Specials", "Sputum AFB", "Sputum C/S", "Stool C/S", "Stool R/E", "TFT"
    , "Throat Swab C/S", "Troponin", "Urethral C/S", "Urine", "Urine ACR", "Urine C/S", "Urine R/E", "Widal", "Wound C/S"];
}

export const get_address = () => {
    return '<p>P.O Box A.N 12143</p><p>Accra North, Ghana</p><p>Tel.: 050 012 5098 / 054 012 5099 / 055 663 3514 / 024 345 0808</p><p>Email: libertymedicallab@gmail.com / amoatengkweku@gmail.com</p><p><strong>Loc:</strong> Opp. Korle Bu Admin Block, Opp. Korle Bu Police Station<p></p>Opp. Amasaman Hospital near World Vision Int\'l Off Methodist Church<p></p>Agyirigano Health Link Clinic, East Legon</p>';
}

export const get_address_linear = () => {
    return '<p>P.O Box A.N 12143, Accra North, Ghana. Tel.: 050 012 5098 / 054 012 5099 / 055 663 3514 / 024 345 0808</p><p><strong>Email:</strong> libertymedicallab@gmail.com / amoatengkweku@gmail.com</p><p><strong>Loc:</strong> Opp. Korle Bu Admin Block, Opp. Korle Bu Police Station; Opp. Amasaman Hospital near World Vision Int\'l Off Methodist Church; Agyirigano Health Link Clinic, East Legon</p>';
}

export const get_front_desk_roles = () => {
    return "Can View Charges List,Can Create Charge,Can Edit Charge, Can View Consultations List,Can View Consultation,Can Create Patient, Can Edit Patient, Can View Patient, Can View Sales List, Can Create Reports,Can View Sale";
}

export const get_lab_technician_roles = () => {
    return "Can View Charges List,Can Create Charge,Can Edit Charge, Can View Categories List, Can Create Category, Can Edit Category, Can View Category, Can View Sales List, Can Create Reports, Can Create Sale, Can Edit Sale,Can View Sale, Can View Stock List, Can Create Stock, Can Edit Stock, Can View Stock";
}
