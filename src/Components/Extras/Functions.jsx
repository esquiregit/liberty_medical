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
export const getFlagOptions = () => {
    return [{ label: 'High', value: 'High'}, { label: 'Low', value: 'Low'}];
}
export const toCapitalCase = (string) => {
    const array    = string.split(' ');
    let new_string = '';
    
    for (var index = 0; index < array.length; index++) {
        const first_letter = array[index].substr(0, 1);
        const remaining    = array[index].substr(1, array[index].length);
        new_string         += first_letter.toUpperCase() + remaining.toLowerCase();
    }
    
    return new_string.trim();
}
export const get_permissions = () => {
    return [
        { label: "Charges",                value: "Charges", disabled: true },
        { label: "Can Create Charge",      value: "Can Create Charge" },
        { label: "Can Edit Charge",        value: "Can Edit Charge" },
        { label: "Can View Charges List",  value: "Can View Charges List" },

        { label: "Lab",                    value: "Lab",      disabled: true },
        { label: "Can Create Lab",         value: "Can Create Lab" },
        { label: "Can Edit Lab",           value: "Can Edit Lab" },
        { label: "Can Pay Lab",            value: "Can Pay Lab" },
        { label: "Can View Lab",           value: "Can View Lab" },
        { label: "Can View Lab List",      value: "Can View Lab List" },

        { label: "Patients",               value: "Patients", disabled: true },
        { label: "Can Create Patient",     value: "Can Create Patient" },
        { label: "Can Edit Patient",       value: "Can Edit Patient" },
        { label: "Can View Patient",       value: "Can View Patient" },
        { label: "Can View Patients List", value: "Can View Patients List" },

        { label: "Reports",                value: "Reports",  disabled: true },
        { label: "Can Create Reports",     value: "Can Create Reports" },

        { label: "Staff",                  value: "Staff",    disabled: true },
        { label: "Can Create Staff",       value: "Can Create Staff" },
        { label: "Can Edit Staff",         value: "Can Edit Staff" },
        { label: "Can View Staff",         value: "Can View Staff" },
        { label: "Can View Staff List",    value: "Can View Staff List" },
        { label: "Can Block Staff",        value: "Can Block Staff" },
        { label: "Can Unblock Staff",      value: "Can Unblock Staff" },
    ];
    // return ["Can Create Lab","Can Edit Lab","Can View Lab","Can Pay Lab","Can View Lab List",
    //         "Can Create Charge","Can Edit Charge","Can View Charges List",
    //         "Can Create Patient","Can Edit Patient","Can View Patient","Can View Patients List","Can Create Reports",
    //         "Can Create Staff","Can Edit Staff","Can View Staff","Can View Staff List","Can Block Staff","Can Unblock Staff"
    //        ].sort();
}
export const get_total_amount = (array) => {
    let total_amount = 0.00;
    array.forEach(value => {
        total_amount += +value['amount'];
    });
    
    return total_amount;
}
export const get_permission_for_role = permissions => {
    let array = [];
    permissions.forEach(permission => {
        array.push({ label: permission, value: permission });
    });

    return array;
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
export const getAge   = (birthDay) => {
    const birthday    = birthDay.split('-');
    const birth_month = birthday[1];
    const birth_day   = birthday[2];
    const birth_year  = birthday[0];

    let todays_date   = new Date();
    let today_year    = todays_date.getFullYear();
    let today_month   = todays_date.getMonth();
    let today_day     = todays_date.getDate();
    let age           = today_year - birth_year;

    if(today_month < (birth_month - 1)) {
        age--;
    }
    if(((birth_month - 1) === today_month) && (today_day < birth_day)) {
        age--;
    }

    return age;
}
export const getRequestData = values => {
    let requests = [];
    
    if(values[0].ferritin) {
        requests.push('Ferritin');
    }
    if(values[0].transferrin) {
        requests.push('Transferrin');
    }
    if(values[0].iron_transferrin) {
        requests.push('Iron + Transferrin');
    }
    if(values[0].folate_serum) {
        requests.push('Folate Serum');
    }
    if(values[0].serum_iron) {
        requests.push('Serum Iron');
    }
    if(values[0].vitamin_b12) {
        requests.push('Vitamin B12');
    }
    if(values[0].fasting_random) {
        requests.push('Fasting Random Blood Glucose');
    }
    if(values[0].twenty_four_hr_ogtt) {
        requests.push('24hr Ogtt');
    }
    if(values[0].twenty_four_hr_post_prandial) {
        requests.push('24hr post prandial glucose');
    }
    if(values[0].twenty_four_hr_urine_protein) {
        requests.push('24hr Urine Protein');
    }
    if(values[0].twenty_four_hr_urine_cortisol) {
        requests.push('24hr Urine Cortisol');
    }
    if(values[0].twenty_four_hr_vma) {
        requests.push('24hr Vma');
    }
    if(values[0].hba1c) {
        requests.push('Hba1c');
    }
    if(values[0].ck) {
        requests.push('Ck');
    }
    if(values[0].ck_mb) {
        requests.push('Ck-mb');
    }
    if(values[0].ldh) {
        requests.push('Ldh');
    }
    if(values[0].lft) {
        requests.push('Lft');
    }
    if(values[0].troponin_i) {
        requests.push('Troponin I');
    }
    if(values[0].troponin_t) {
        requests.push('Troponin T');
    }
    if(values[0].cardiac_enzymes) {
        requests.push('Cardiac Enzymes');
    }
    if(values[0].amylase) {
        requests.push('Amylase');
    }
    if(values[0].lipase) {
        requests.push('Lipase');
    }
    if(values[0].serum_calcium_corrected) {
        requests.push('Serum Calcium Corrected');
    }
    if(values[0].serum_calcium_ionised) {
        requests.push('Serum Calcium Ionised');
    }
    if(values[0].phosphate) {
        requests.push('Phosphate');
    }
    if(values[0].uric_acid) {
        requests.push('Uric Acid');
    }
    if(values[0].magnessium) {
        requests.push('Magnessium');
    }
    if(values[0].total_protein) {
        requests.push('Total Protein');
    }
    if(values[0].albumin) {
        requests.push('Albumin');
    }
    if(values[0].total_bilirubin) {
        requests.push('Total Bilirubin');
    }
    if(values[0].direct_bilirubin) {
        requests.push('Direct Bilirubin');
    }
    if(values[0].bue_creatinine) {
        requests.push('Bue Creatinine');
    }
    if(values[0].fasting_lipids) {
        requests.push('Fasting Lipids');
    }
    if(values[0].fasting_random_blood_glucose) {
        requests.push('Fasting Random Blood Glucose');
    }
    if(values[0].csf_biochem) {
        requests.push('Csf Biochem');
    }
    if(values[0].pleural_ascitic_synovial_fluid) {
        requests.push('Pleural Ascitic Synovial Fluid');
    }
    if(values[0].protein_electrophoresis) {
        requests.push('Protein Electrophoresis');
    }
    if(values[0].creatinine_clearance) {
        requests.push('Creatinine Clearance');
    }
    if(values[0].u_microalbumin_creatinine_ratio) {
        requests.push('U - Micro Albumin creatinine Ratio');
    }
    if(values[0].bicarbonate) {
        requests.push('Bicarbonate');
    }
    if(values[0].bence_jones_protein) {
        requests.push('Bence Jones Protein');
    }
    if(values[0].free_light_chains) {
        requests.push('Free Light Chains');
    }
    if(values[0].b2_microalbumin) {
        requests.push('B2 Microalbumin');
    }
    if(values[0].immunoglobulin) {
        requests.push('Immunoglobulin');
    }
    if(values[0].full_blood_count) {
        requests.push('Full Blood Count (fbc)');
    }
    if(values[0].fbc_blood_film_comment) {
        requests.push('Fbc + Blood Film Comment');
    }
    if(values[0].esr) {
        requests.push('Esr');
    } 
    if(values[0].reticulocytes_count) {
        requests.push('Reticulocytes Count');
    }
    if(values[0].sickling_test) {
        requests.push('Sickling Test');
    }
    if(values[0].g6pd_qualitative) {
        requests.push('G6pd Qualitative');
    }
    if(values[0].bf_for_mps) {
        requests.push('Bf For Mps');
    }
    if(values[0].hb_electrophoresis) {
        requests.push('Hb Electrophoresis');
    }
    if(values[0].direct_anti_human_globulin) {
        requests.push('Direct Anti Human Globulin');
    }
    if(values[0].indirect_anti_human_globulin) {
        requests.push('Indirect Anti Human Globulin');
    }
    if(values[0].trophozoites_count) {
        requests.push('Trophozoites Count');
    }
    if(values[0].blood_group) {
        requests.push('Blood Group + Rh Antigen');
    }
    if(values[0].clotting_profile) {
        requests.push('Clotting Profile');
    }
    if(values[0].d_dimer) {
        requests.push('D - Dimer');
    }
    if(values[0].protein_c) {
        requests.push('Protein C');
    }
    if(values[0].protein_s) {
        requests.push('Protein S');
    }
    if(values[0].fibrinogen) {
        requests.push('Fibrinogen');
    }
    if(values[0].bleeding_time) {
        requests.push('Bleeding Time');
    }
    if(values[0].clotting_time) {
        requests.push('Clotting Time');
    }
    if(values[0].factor_8) {
        requests.push('Factor 8');
    }
    if(values[0].factor_9) {
        requests.push('Factor 9');
    }
    if(values[0].von_willibrands_factor) {
        requests.push('Von Willibrands Factor');
    }
    if(values[0].anti_thrombin_iii_functional) {
        requests.push('Anti Thrombin Iii Functional');
    }
    if(values[0].anti_ccp) {
        requests.push('Anti Ccp');
    }
    if(values[0].hvs_cs) {
        requests.push('Hvs C/s');
    }
    if(values[0].hvs_re) {
        requests.push('Hvs R/e');
    }
    if(values[0].skin_scraping_fungal_elements) {
        requests.push('Skin Scraping For Fungal Elements');
    }
    if(values[0].skin_scraping_culture) {
        requests.push('Skin Scraping For Culture');
    }
    if(values[0].endocervical_swab) {
        requests.push('Endocervical Swab For C/s');
    }
    if(values[0].cervical_swab) {
        requests.push('Cervical Swab For C/s');
    }
    if(values[0].prothrombin_time) {
        requests.push('Prothrombin Time (pt) - Inr');
    }
    if(values[0].thromboplastin_time) {
        requests.push('Thromboplastin Time (aptt)');
    }
    if(values[0].h_pylori_antigen) {
        requests.push('H. Pylori Antigen');
    } 
    if(values[0].h_pylori_antibodies) {
        requests.push('H. Pylori Antibodies');
    } 
    if(values[0].mononucleosis_spot) {
        requests.push('Mononucleosis Spot - Paul Bunnel');
    }
    if(values[0].widal_test) {
        requests.push('Widal Test');
    }
    
    if(values[0].blood_cs) {
        requests.push('Blood C/s');
    }
    if(values[0].csf_bacteriology) {
        requests.push('Csf Bacteriology');
    }
    if(values[0].corneal_scrapping) {
        requests.push('Corneal Scrapping For C/s');
    }
    if(values[0].semen_cs) {
        requests.push('Semen C/s');
    }
    if(values[0].anti_streptplysin_o) {
        requests.push('Anti Streptolysin O');
    }
    if(values[0].vdrl) {
        requests.push('Vdrl');
    }
    if(values[0].t_pallidium_latex) {
        requests.push('T. Pallidium Latex');
    }
    if(values[0].t_pallidium_antibody) {
        requests.push('T. Pallidium Antibody');
    }
    if(values[0].toxo) {
        requests.push('Toxo - Igg And Igm');
    }
    if(values[0].cmv) {
        requests.push('Cmv - Iga And Igm');
    }
    if(values[0].hepatitis_a) {
        requests.push('Hepatitis A');
    }
    if(values[0].hepatitis_b_screen) {
        requests.push('Hepatitis B Screen');
    }
    if(values[0].hepatitis_c_screen) {
        requests.push('Hepatitis C Screen');
    }
    if(values[0].hepatitis_b_profile) {
        requests.push('Hepatitis B Profile');
    }
    if(values[0].hepatitis_b_viral_load) {
        requests.push('Hepatitis B Viral Load');
    }
    if(values[0].hepatitis_c_viral_load) {
        requests.push('Hepatitis C Viral Load');
    }
    if(values[0].retro_screen) {
        requests.push('Retro Screen');
    }
    if(values[0].retro_screen_confirmation) {
        requests.push('Retro Screen Confirmation');
    }
    if(values[0].rubella) {
        requests.push('Rubella Igg And Igm');
    }
    if(values[0].hiv_viral_load) {
        requests.push('Hiv Viral Load');
    }
    if(values[0].gonorrhoea_ab) {
        requests.push('Gonorrhoea Ab');
    }
    if(values[0].chlamydia_abs) {
        requests.push('Chlamydia Abs');
    }
    if(values[0].syphilis_profile) {
        requests.push('Syphilis Profile Vdrl T. Pallidium Igg And Igm');
    }
    if(values[0].bilhazia_antigen) {
        requests.push('Bilhazia Antigen Urine Serum');
    }
    if(values[0].bilhazia_antibody) {
        requests.push('Bilhazia Antibody (igg And Igm)');
    }
    if(values[0].thyroid_function_test) {
        requests.push('Thyroid Function Test');
    }
    if(values[0].tsh) {
        requests.push('Tsh');
    }
    if(values[0].ft3) {
        requests.push('Ft3');
    }
    if(values[0].ft4) {
        requests.push('Ft4');
    }
    if(values[0].thyroglobin_antibody) {
        requests.push('Thyroglobin Antibody');
    }
    if(values[0].thyroid_auto_antibodies) {
        requests.push('Thyroid Auto Antibodies');
    }
    if(values[0].tsh_releasing_receptors_antibody) {
        requests.push('Tsh Releasing Receptors Antibody');
    }
    if(values[0].lh) {
        requests.push('Lh');
    }
    if(values[0].fsh) {
        requests.push('Fsh');
    }
    if(values[0].prolactin) {
        requests.push('Prolactin');
    }
    if(values[0].oestradiol) {
        requests.push('Oestradiol');
    }
    if(values[0].testosterone) {
        requests.push('Testosterone');
    }
    if(values[0].estrogen) {
        requests.push('Estrogen');
    }
    if(values[0].cortisol) {
        requests.push('Cortisol (blood)');
    }
    if(values[0].progesterone) {
        requests.push('Progesterone');
    }
    if(values[0].female_fertility_hormonal_assay) {
        requests.push('Female Fertility Hormonal Assay');
    }
    if(values[0].male_fertility_hormonal_assay) {
        requests.push('Male Fertility Hormonal Assay');
    }
    if(values[0].sex_hormone_binding_globulin) {
        requests.push('Sex Hormone Binding Globulin');
    }
    if(values[0].semen_antibodies) {
        requests.push('Semen Antibodies');
    }
    if(values[0].antimulerian_hormone) {
        requests.push('Antimulerian Hormone');
    }
    if(values[0].free_testosterone) {
        requests.push('Free Testosterone');
    }
    if(values[0].estrol) {
        requests.push('Estrol - E3');
    }
    if(values[0].semen_analysis) {
        requests.push('Semen Analysis');
    }
    if(values[0].growth_hormone) {
        requests.push('Growth Hormone (fasting/random)');
    }
    if(values[0].aldenocortitropic_hormone) {
        requests.push('Aldenocortitropic Hormone (Acth)');
    }
    if(values[0].aldosterone) {
        requests.push('Aldosterone');
    }
    if(values[0].dheas) {
        requests.push('Dheas');
    }
    if(values[0].acetylcholine_receptor_antibody) {
        requests.push('Acetylcholine Receptor Antibody');
    }
    if(values[0].angiotensin_converting_enzymes) {
        requests.push('Angiotensin Converting Enzymes (Ace)');
    }
    if(values[0].parathyroid_hormone) {
        requests.push('Parathyroid Hormone (pth)');
    }
    if(values[0].seventeen_oh_progesterone) {
        requests.push('17 Oh Progesterone');
    }
    if(values[0].afp) {
        requests.push('Afp');
    }
    if(values[0].psa) {
        requests.push('Psa');
    }
    if(values[0].cea) {
        requests.push('Cea');
    } 
    if(values[0].ca_125) {
        requests.push('Ca - 12.5');
    } 
    if(values[0].ca_153) {
        requests.push('Ca - 15.3');
    } 
    if(values[0].ca_199) {
        requests.push('Ca - 19.9');
    } 
    if(values[0].crp) {
        requests.push('Crp');
    } 
    if(values[0].total_b_hcg) {
        requests.push('Total Bhcg - Blood Qualitative');
    }
    if(values[0].sputum_afb) {
        requests.push('Sputum For Afb');
    }
    if(values[0].sputum_cs) {
        requests.push('Sputum For C/s');
    }
    
    if(values[0].stool_cs) {
        requests.push('Stool C/s');
    }
    if(values[0].stool_for_rota_and_adnoviruses) {
        requests.push('Stool For Rota And Adnoviruses');
    }
    if(values[0].stool_re) {
        requests.push('Stool R/e');
    }
    if(values[0].stool_occult_blood_test) {
        requests.push('Stool Occult Blood Test');
    }
    
    if(values[0].urine_cs) {
        requests.push('Urine C/s');
    }
    if(values[0].urine_re) {
        requests.push('Urine R/e');
    }
    if(values[0].urine_reducing_substance) {
        requests.push('Urine Reducing Substance');
    }
    if(values[0].faecal_reducing_substance) {
        requests.push('Faecal Reducing Substance');
    }
    if(values[0].lactate) {
        requests.push('Lactate');
    }
    if(values[0].urethral_swab_gram) {
        requests.push('Urethral Swab For Gram Stain');
    }
    if(values[0].urethral_swab_cs) {
        requests.push('Urethral Swab For C/s');
    }
    if(values[0].urethral_swab_gram_stain) {
        requests.push('urethral swab for gram stain');
    }
    if(values[0].throat_swab_cs) {
        requests.push('Throat Swab For C/s');
    }
    if(values[0].ear_swab_cs) {
        requests.push('Ear Swab For C/s');
    }
    if(values[0].eye_swab_cs) {
        requests.push('Eye Swab For C/s');
    }
    if(values[0].wound_swab_cs) {
        requests.push('Wound Swab For C/s');
    }
    if(values[0].abdominal_scan) {
        requests.push('Abdominal Scan');
    }
    if(values[0].abdominal_pelvic_scan) {
        requests.push('Abdomino Pelvic Scan');
    }
    if(values[0].breast_scan) {
        requests.push('Breast Scan');
    }
    if(values[0].obstetric_scan) {
        requests.push('Obstetric Scan');
    }
    if(values[0].pelvic_scan_gynaecology) {
        requests.push('Pelvic Scan Gynaecology');
    }
    if(values[0].pelvic_scan_urology) {
        requests.push('Pelvic Scan Urology');
    }
    if(values[0].prostate_scan) {
        requests.push('Prostate Scan');
    }
    if(values[0].scrotal_scan) {
        requests.push('Scrotal Scan');
    }
    if(values[0].superficial_swellings) {
        requests.push('Superficial Swellings');
    }
    if(values[0].thyroid_scan_anterior_neck_swelling) {
        requests.push('Thyroid Scan Anterior Neck Swelling');
    }
    if(values[0].other_small_parts) {
        requests.push('Other Small Parts');
    }

    if(values[0].hcv_antibodies) {
        requests.push('Hcv Antibodies');
    }

    return requests;
}
export const get_branches = () => {
    return ["Amasaman", "East Legon", "Kasoa", "Korle Bu"];
}
export const getDefaultRequestValues = () => {
    return [
        {
            twenty_four_hr_ogtt: false,
            twenty_four_post_prandial: false,
            twenty_four_urine_protein: false,
            twenty_four_vma: false,
            amylase: false,
            albumin: false,
            b2_microalbumin: false,
            bence_jones_protein: false,
            bicarbonate: false,
            bue_creatinine: false,
            cardiac_enzymes: false,
            ck: false,
            ck_mb: false,
            creatinine_clearance: false,
            csf_biochem: false,
            direct_bilirubin: false,
            faecal_reducing_substance: false,
            fasting_lipids: false,
            fasting_random_blood_glucose: false,
            ferritin: false,
            folate_serum: false,
            free_light_chains: false,
            hba1c: false,
            immunoglobulin: false,
            iron_transferrin: false,
            lactate: false,
            ldh: false,
            lft: false,
            lipase: false,
            magnessium: false,
            phosphate: false,
            pleural_ascitic_synovial_fluid: false,
            protein_electrophoresis: false,
            serum_calcium_corrected: false,
            serum_calcium_ionised: false,
            serum_iron: false,
            total_protein: false,
            total_bilirubin: false,
            transferrin: false,
            troponin_i: false,
            troponin_t: false,
            u_microalbumin_creatinine_ratio: false,
            uric_acid: false,
            urine_reducing_substance: false,
            vitamin_b12: false,
            bf_for_mps: false,
            blood_group: false,
            direct_anti_human_globulin: false,
            esr: false,
            fbc_blood_film_comment: false,
            full_blood_count: false,
            g6pd_qualitative: false,
            hb_electrophoresis: false,
            indirect_anti_human_globulin: false,
            mononucleosis_spot: false,
            reticulocytes_count: false,
            sickling_test: false,
            trophozoites_count: false,
            anti_ccp: false,
            anti_thrombin_iii_functional: false,
            bleeding_time: false,
            clotting_profile: false,
            clotting_time: false,
            d_dimer: false,
            factor_8: false,
            factor_9: false,
            fibrinogen: false,
            protein_c: false,
            protein_s: false,
            prothrombin_time: false,
            thromboplastin_time: false,
            von_willibrands_factor: false,
            blood_cs: false,
            cervical_swab: false,
            corneal_scrapping: false,
            csf_bacteriology: false,
            ear_swab_cs: false,
            eye_swab_cs: false,
            prostate_scan : false,
            endocervical_swab: false,
            h_pylori_antibodies: false,
            h_pylori_antigen: false,
            hvs_cs: false,
            hvs_re: false,
            semen_cs: false,
            skin_scraping_culture: false,
            skin_scraping_fungal_elements: false,
            stool_cs: false,
            stool_for_rota_and_adnoviruses: false,
            stool_occult_blood_test: false,
            stool_re: false,
            sputum_afb: false,
            sputum_cs: false,
            throat_swab_cs: false,
            urethral_swab_cs: false,
            urethral_swab_gram_stain: false,
            urine_cs: false,
            urine_re: false,
            widal_test: false,
            wound_swab_cs: false,
            anti_streptplysin_o: false,
            bilhazia_antibody: false,
            bilhazia_antigen: false,
            chlamydia_abs: false,
            cmv: false,
            gonorrhoea_ab: false,
            hepatitis_a: false,
            hepatitis_b_profile: false,
            hepatitis_b_screen: false,
            hepatitis_b_viral_load: false,
            hepatitis_c_screen: false,
            hepatitis_c_viral_load: false,
            hiv_viral_load: false,
            retro_screen: false,
            retro_screen_confirmation: false,
            rubella: false,
            syphilis_profile: false,
            t_pallidium_latex: false,
            t_pallidium_antibody: false,
            toxo: false,
            vdrl: false,
            ft3: false,
            ft4: false,
            thyroglobin_antibody: false,
            thyroid_auto_antibodies: false,
            thyroid_function_test: false,
            tsh_releasing_receptors_antibody: false,
            tsh: false,
            seventeen_oh_progesterone: false,
            twenty_four_urine_cortisol: false,
            acetylcholine_receptor_antibody: false,
            aldenocortitropic_hormone: false,
            aldosterone: false,
            angiotensin_converting_enzymes: false,
            antimulerian_hormone: false,
            cortisol: false,
            dheas: false,
            estrogen: false,
            estrol: false,
            female_fertility_hormonal_assay: false,
            male_fertility_hormonal_assay: false,
            free_testosterone: false,
            fsh: false,
            growth_hormone: false,
            lh: false,
            oestradiol: false,
            parathyroid_hormone: false,
            progesterone: false,
            prolactin: false,
            semen_analysis: false,
            semen_antibodies: false,
            sex_hormone_binding_globulin: false,
            testosterone: false,
            afp: false,
            ca_125: false,
            ca_153: false,
            ca_199: false,
            cea: false,
            crp: false,
            psa: false,
            total_b_hcg: false,
            abdominal_scan: false,
            abdominal_pelvic_scan: false,
            breast_scan: false,
            obstetric_scan: false,
            pelvic_scan_gynaecology: false,
            pelvic_scan_urology: false,
            scrotal_scan: false,
            superficial_swellings: false,
            thyroid_scan_anterior_neck_swelling: false,
            other_small_parts: false
        }
    ];
}
export const getPrefilledRequestValues = requests => {
    return [
        {
            seventeen_oh_progesterone : requests.includes('17 oh progesterone'),
            twenty_four_hr_ogtt : requests.includes('24hr ogtt'),
            twenty_four_hr_post_prandial : requests.includes('24hr post prandial glucose'),
            twenty_four_hr_urine_cortisol : requests.includes('24hr urine cortisol'),
            twenty_four_hr_urine_protein : requests.includes('24hr urine protein'),
            twenty_four_hr_vma : requests.includes('24hr vma'),
            abdominal_scan : requests.includes('abdominal scan'),
            abdominal_pelvic_scan : requests.includes('abdominal pelvic scan'),
            acetylcholine_receptor_antibody : requests.includes('acetylcholine receptor antibody'),
            afp : requests.includes('afp'),
            albumin : requests.includes('albumin'),
            aldenocortitropic_hormone : requests.includes('aldenocortitropic hormone (acth)'),
            aldosterone : requests.includes('aldosterone'),
            amylase : requests.includes('amylase'),
            angiotensin_converting_enzymes : requests.includes('angiotensin converting enzymes (ace)'),
            anti_ccp : requests.includes('anti ccp'),
            anti_thrombin_iii_functional : requests.includes('anti thrombin iii functional'),
            anti_streptplysin_o : requests.includes('anti streptolysin o'),
            antimulerian_hormone : requests.includes('antimulerian hormone'),

            b2_microalbumin : requests.includes('b2 microalbumin'),
            bence_jones_protein : requests.includes('bence jones protein'),
            bf_for_mps : requests.includes('bf for mps'),
            bicarbonate : requests.includes('bicarbonate'),
            bilhazia_antibody : requests.includes('bilhazia antibody (igg and igm)'),
            bilhazia_antigen : requests.includes('bilhazia antigen urine serum'),
            bleeding_time : requests.includes('bleeding time'),
            blood_cs : requests.includes('blood c/s'),
            blood_group : requests.includes('blood group + rh antigen'),
            breast_scan : requests.includes('breast scan'),
            bue_creatinine : requests.includes('bue creatinine'),

            ca_125 : requests.includes('ca - 12.5'),
            ca_153 : requests.includes('ca - 15.3'),
            ca_199 : requests.includes('ca - 19.9'),
            cardiac_enzymes : requests.includes('cardiac enzymes'),
            cea : requests.includes('cea'),
            cervical_swab : requests.includes('cervical swab for c/s'),
            chlamydia_abs : requests.includes('chlamydia abs'),
            ck : requests.includes('ck'),
            ck_mb : requests.includes('ck-mb'),
            clotting_profile : requests.includes('clotting profile'),
            clotting_time : requests.includes('clotting time'),
            cmv : requests.includes('cmv - iga and igm'),
            corneal_scrapping : requests.includes('corneal scrapping for c/s'),
            cortisol : requests.includes('cortisol (blood)'),
            creatinine_clearance : requests.includes('creatinine clearance'),
            crp : requests.includes('crp'),
            csf_bacteriology : requests.includes('csf bacteriology'),
            csf_biochem : requests.includes('csf biochem'),

            d_dimer : requests.includes('d - dimer'),
            dheas : requests.includes('dheas'),
            direct_anti_human_globulin : requests.includes('direct anti human globulin'),
            direct_bilirubin : requests.includes('direct bilirubin'),

            ear_swab_cs : requests.includes('ear swab for c/s'),
            endocervical_swab : requests.includes('endocervical swab for c/s'),
            esr : requests.includes('esr'),
            estrogen : requests.includes('estrogen'),
            estrol : requests.includes('estrol - e3'),
            eye_swab_cs : requests.includes('eye swab for c/s'),

            factor_8 : requests.includes('factor 8'),
            factor_9 : requests.includes('factor 9'),
            faecal_reducing_substance : requests.includes('faecal reducing substance'),
            fasting_lipids : requests.includes('fasting lipids'),
            fasting_random_blood_glucose : requests.includes('fasting random blood glucose'),
            fbc_blood_film_comment : requests.includes('fbc + blood film comment'),
            female_fertility_hormonal_assay : requests.includes('female fertility hormonal assay'),
            ferritin : requests.includes('ferritin'),
            fibrinogen : requests.includes('fibrinogen'),
            folate_serum : requests.includes('folate serum'),
            free_light_chains : requests.includes('free light chains'),
            free_testosterone : requests.includes('free testosterone'),
            fsh : requests.includes('fsh'),
            ft3 : requests.includes('ft3'),
            ft4 : requests.includes('ft4'),
            full_blood_count : requests.includes('full blood count (fbc)'),

            g6pd_qualitative : requests.includes('g6pd qualitative'),
            gonorrhoea_ab : requests.includes('gonorrhoea ab'),
            growth_hormone : requests.includes('growth hormone (fasting/random)'),

            h_pylori_antibodies : requests.includes('h. pylori antibodies'),
            h_pylori_antigen : requests.includes('h. pylori antigen'),
            hb_electrophoresis : requests.includes('hb electrophoresis'),
            hba1c : requests.includes('hba1c'),
            hepatitis_a : requests.includes('hepatitis a'),
            hepatitis_b_profile : requests.includes('hepatitis b profile'),
            hepatitis_b_screen : requests.includes('hepatitis b screen'),
            hepatitis_b_viral_load : requests.includes('hepatitis b viral load'),
            hepatitis_c_screen : requests.includes('hepatitis c screen'),
            hepatitis_c_viral_load : requests.includes('hepatitis c viral load'),
            hiv_viral_load : requests.includes('hiv viral load'),
            hvs_cs : requests.includes('hvs c/s'),
            hvs_re : requests.includes('hvs r/e'),

            immunoglobulin : requests.includes('immunoglobulin'),
            indirect_anti_human_globulin : requests.includes('indirect anti human globulin'),
            iron_transferrin : requests.includes('iron + transferrin'),

            lactate : requests.includes('lactate'),
            ldh : requests.includes('ldh'),
            lft : requests.includes('lft'),
            lh : requests.includes('lh'),
            lipase : requests.includes('lipase'),

            magnessium : requests.includes('magnessium'),
            male_fertility_hormonal_assay : requests.includes('male fertility hormonal assay'),
            mononucleosis_spot : requests.includes('mononucleosis spot - paul bunnel'),

            obstetric_scan : requests.includes('obstetric scan'),
            oestradiol : requests.includes('oestradiol'),
            other_small_parts : requests.includes('other small parts'),

            parathyroid_hormone : requests.includes('parathyroid hormone (pth)'),
            pelvic_scan_gynaecology : requests.includes('pelvic scan gynaecology'),
            pelvic_scan_urology : requests.includes('pelvic scan urology'),
            phosphate : requests.includes('phosphate'),
            pleural_ascitic_synovial_fluid : requests.includes('pleural ascitic synovial fluid'),
            progesterone : requests.includes('progesterone'),
            prolactin : requests.includes('prolactin'),
            prostate_scan : requests.includes('prostate scan'),
            protein_c : requests.includes('protein c'),
            protein_electrophoresis : requests.includes('protein electrophoresis'),
            protein_s : requests.includes('protein s'),
            prothrombin_time : requests.includes('prothrombin time (pt) - inr'),
            psa : requests.includes('psa'),

            reticulocytes_count : requests.includes('reticulocytes count'),
            retro_screen : requests.includes('retro screen'),
            retro_screen_confirmation : requests.includes('retro screen confirmation'),
            rubella : requests.includes('rubella igg and igm'),

            scrotal_scan : requests.includes('scrotal scan'),
            semen_analysis : requests.includes('semen analysis'),
            semen_antibodies : requests.includes('semen antibodies'),
            semen_cs : requests.includes('semen c/s'),
            serum_calcium_corrected : requests.includes('serum calcium corrected'),
            serum_calcium_ionised : requests.includes('serum calcium ionised'),
            serum_iron : requests.includes('serum iron'),
            sex_hormone_binding_globulin : requests.includes('sex hormone binding globulin'),
            sickling_test : requests.includes('sickling test'),
            skin_scraping_culture : requests.includes('skin scraping for culture'),
            skin_scraping_fungal_elements : requests.includes('skin scraping for fungal elements'),
            sputum_afb : requests.includes('sputum for afb'),
            sputum_cs : requests.includes('sputum for c/s'),
            stool_cs : requests.includes('stool c/s'),
            stool_for_rota_and_adnoviruses : requests.includes('stool for rota and adnoviruses'),
            stool_occult_blood_test : requests.includes('stool occult blood test'),
            stool_re : requests.includes('stool r/e'),
            superficial_swellings : requests.includes('superficial swellings'),
            syphilis_profile : requests.includes('syphilis profile vdrl t. pallidium igg and igm'),

            t_pallidium_latex : requests.includes('t. pallidium antibody'),
            t_pallidium_antibody : requests.includes('t. pallidium latex'),
            testosterone : requests.includes('testosterone'),
            throat_swab_cs : requests.includes('throat swab for c/s'),
            thromboplastin_time : requests.includes('thromboplastin time (aptt)'),
            thyroglobin_antibody : requests.includes('thyroglobin antibody'),
            thyroid_auto_antibodies : requests.includes('thyroid auto antibodies'),
            thyroid_function_test : requests.includes('thyroid function test'),
            thyroid_scan_anterior_neck_swelling : requests.includes('thyroid scan anterior neck swelling'),
            total_b_hcg : requests.includes('total bhcg - blood qualitative'),
            total_bilirubin : requests.includes('total bilirubin'),
            total_protein : requests.includes('total protein'),
            toxo : requests.includes('toxo - igg and igm'),
            transferrin : requests.includes('transferrin'),
            trophozoites_count : requests.includes('trophozoites count'),
            troponin_i : requests.includes('troponin i'),
            troponin_t : requests.includes('troponin t'),
            tsh_releasing_receptors_antibody : requests.includes('tsh releasing receptors antibody'),
            tsh : requests.includes('tsh'),

            u_microalbumin_creatinine_ratio : requests.includes('u - micro albumin creatinine ratio'),
            urethral_swab_cs : requests.includes('urethral swab for c/s'),
            urethral_swab_gram_stain : requests.includes('urethral swab for gram stain'),
            uric_acid : requests.includes('uric acid'),
            urine_cs : requests.includes('urine c/s'),
            urine_re : requests.includes('urine r/e'),
            urine_reducing_substance : requests.includes('urine reducing substance'),

            vdrl : requests.includes('vdrl'),
            vitamin_b12 : requests.includes('vitamin b12'),
            von_willibrands_factor : requests.includes('von willibrands factor'),

            widal_test : requests.includes('widal test'),
            wound_swab_cs : requests.includes('wound swab for c/s'),
        }
    ];
}

export const get_months_short = () => {
    return ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
}

export const get_months_full = () => {
    return ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
}

export const getTodaysDate = () => {
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

export const getAppearances = () => {
    return [
        { label: "Blood Stain", value: "Blood Stain" },
        { label: "Bloody", value: "Bloody" },
        { label: "Clear", value: "Clear" },
        { label: "Clear and Colourless", value: "Clear and Colourless" },
        { label: "Cloudy", value: "Cloudy" },
        { label: "Hazy", value: "Hazy" },
        { label: "Slightly Turbid", value: "Slightly Turbid" },
        { label: "Turbid", value: "Turbid" },
        { label: "Xanthochromic", value: "Xanthochromic" }
    ];
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

export const getGlobulins = () => {
    return [
        { label: "Negative", value: "Negative" },
        { label: "Present(+)", value: "Present(+)" },
        { label: "Present(+2)", value: "Present(+2)" },
        { label: "Present(+3)", value: "Present(+3)" },
        { label: "Present(+4)", value: "Present(+4)" },
        { label: "Trace", value: "Trace" }
    ];
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
