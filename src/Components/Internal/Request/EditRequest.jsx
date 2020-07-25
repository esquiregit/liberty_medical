import React, { useState } from 'react';
import Grid from '@material-ui/core/Grid';
import Axios from 'axios';
import Tippy from '@tippy.js/react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import styles from '../../Extras/styles';
import Toastrr from '../../Extras/Toastrr';
import Backdrop from '@material-ui/core/Backdrop';
import Checkbox from '@material-ui/core/Checkbox';
import FormGroup from '@material-ui/core/FormGroup';
import FormLabel from '@material-ui/core/FormLabel';
import FormControl from '@material-ui/core/FormControl';
import FormHelperText from '@material-ui/core/FormHelperText';
import ConfirmDialogue from '../../Extras/ConfirmDialogue';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import CircularProgress from '@material-ui/core/CircularProgress';
import { getBaseURL } from '../../Extras/server';
import { getRequestData, getPrefilledRequestValues } from '../../Extras/Functions';
import { DialogContent, DialogActions, DialogTitle, Transition } from '../../Extras/Dialogue';
import 'tippy.js/dist/tippy.css';

function EditRequest({ request, closeEditModal, closeExpandable, staff_id }) {
    const requests = request.requests.toLowerCase().split(', ');
    const classes  = styles();

    const [values, setValues]     = useState(getPrefilledRequestValues(requests));
    const [open, setOpen]         = useState(true);
    const [error, setError]       = useState(false);
    const [message, setMessage]   = useState('');
    const [warning, setWarning]   = useState(false);
    const [backdrop, setBackdrop] = useState(false);
    const [comError, setComError] = useState(false);
    const [formValid, setFormValid]       = useState(false);
    const [formTouched, setFormTouched]   = useState(false);
    const [showDialogue, setShowDialogue] = useState(false);

    const handleClose    = () => { setOpen(false); closeEditModal(); };
    const handleChange   = event => {
        const name      = event.target.name;
        const checked   = event.target.checked;
        let newArr      = [...values];
        newArr[0][name] = checked;            
        
        setValues(newArr);
        setFormValid(validateValues());
    };
    const validateValues = () => {
        setFormTouched(true);
        const newValues  = values[0];
        let checked      = 0;
        let unchecked    = 0;
        
        for (const index in newValues) {
            if(newValues[index]) {
                checked++;
            } else {
                unchecked++;
            }
        }
        
        if(checked > 0) {
            return true;
        // } else if(unchecked === 171) {
        } else if(unchecked === values.length) {
            return false;
        }
    };
    const closeConfirm   = result => {
        setShowDialogue(false);
        result.toLowerCase() === 'yes' && onSubmit();
    };
    const onConfirm      = event => {
        event.preventDefault();
        setShowDialogue(true);
    };
    const onSubmit       = () => {
        setBackdrop(true);
        setError(false);
        setWarning(false);
        setComError(false);
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        const data = {
            requests: getRequestData(values),
            id: request.id,
            patient_id: request.patient_id,
            request_id: request.request_id,
            staff: staff_id
        }
        // console.log('data: ', data)
        Axios.post(getBaseURL()+'edit_request', data, { signal: signal })
            .then(response => {
                if(response.data[0].status.toLowerCase() === 'success') {
                    setOpen(false);
                    closeExpandable(response.data[0].message);
                } else if(response.data[0].status.toLowerCase() === 'warning') {
                    setMessage(response.data[0].message);
                    setWarning(true);
                } else {
                    setError(true);
                    setMessage(response.data[0].message);
                }
                setBackdrop(false);
            })
            .catch(error => {
                setComError(true);
                setBackdrop(false);
                setMessage('Network Error. Server Unreachable....');
            });

        return () => abortController.abort();
    };
    const reset          = () => {
        setFormValid(false);
        setValues(getPrefilledRequestValues(requests));
    }

    return (
        <>
            { error        && <Toastrr message={message} type="error"   /> }
            { warning      && <Toastrr message={message} type="warning" /> }
            { comError     && <Toastrr message={message} type="info"    /> }
            { showDialogue && <ConfirmDialogue message={'Are You Sure You Want To Update Request?'} closeConfirm={closeConfirm} /> }
            <Backdrop className={classes.backdrop} open={backdrop}>
                <CircularProgress color="inherit" /> <span className='ml-15'>Updating Request. Please Wait....</span>
            </Backdrop>
            <Dialog
                open={open}
                onClose={handleClose}
                scroll='paper'
                fullWidth={true}
                maxWidth='lg'
                TransitionComponent={Transition}
                disableBackdropClick={true}
                disableEscapeKeyDown={true}
                aria-labelledby="scroll-dialog-title"
                aria-describedby="scroll-dialog-description">
                <DialogTitle id="customized-dialog-title" onClose={handleClose}>
                    Update Request For {request.patient}
                </DialogTitle>
                <DialogContent dividers={true}>
                    <form>
                        <FormControl required error={formTouched && !formValid} component="fieldset" className={classes.formControl}>
                            <FormLabel component="legend">At Least One Test Should Be Selected</FormLabel>
                            <FormGroup>
                                <h3>1. general chemistry</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={3}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].twenty_four_hr_ogtt : false} onChange={handleChange} name="twenty_four_hr_ogtt" />}
                                            label="24hr ogtt" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].twenty_four_hr_post_prandial : false} onChange={handleChange} name="twenty_four_hr_post_prandial" />}
                                            label="24hr post prandial" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].twenty_four_hr_urine_protein : false} onChange={handleChange} name="twenty_four_hr_urine_protein" />}
                                            label="24hr urine protein" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].twenty_four_hr_vma : false} onChange={handleChange} name="twenty_four_hr_vma" />}
                                            label="24hr vma" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].amylase : false} onChange={handleChange} name="amylase" />}
                                            label="amylase" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].albumin : false} onChange={handleChange} name="albumin" />}
                                            label="albumin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].b2_microalbumin : false} onChange={handleChange} name="b2_microalbumin" />}
                                            label="b2 microalbumin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bence_jones_protein : false} onChange={handleChange} name="bence_jones_protein" />}
                                            label="bence jones protein" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bicarbonate : false} onChange={handleChange} name="bicarbonate" />}
                                            label="bicarbonate" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bue_creatinine : false} onChange={handleChange} name="bue_creatinine" />}
                                            label="bue creatinine" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].cardiac_enzymes : false} onChange={handleChange} name="cardiac_enzymes" />}
                                            label="cardiac enzymes" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].ck : false} onChange={handleChange} name="ck" />}
                                            label="ck" />
                                    </Grid>
                                    <Grid item xs={12} sm={3}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].ck_mb : false} onChange={handleChange} name="ck_mb" />}
                                            label="ck mb" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].creatinine_clearance : false} onChange={handleChange} name="creatinine_clearance" />}
                                            label="creatinine clearance" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].csf_biochem : false} onChange={handleChange} name="csf_biochem" />}
                                            label="csf biochem" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].direct_bilirubin : false} onChange={handleChange} name="direct_bilirubin" />}
                                            label="direct bilirubin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].faecal_reducing_substance : false} onChange={handleChange} name="faecal_reducing_substance" />}
                                            label="faecal reducing substance" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].fasting_lipids : false} onChange={handleChange} name="fasting_lipids" />}
                                            label="fasting lipids" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].fasting_random_blood_glucose : false} onChange={handleChange} name="fasting_random_blood_glucose" />}
                                            label="fasting random blood glucose" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].ferritin : false} onChange={handleChange} name="ferritin" />}
                                            label="ferritin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].folate_serum : false} onChange={handleChange} name="folate_serum" />}
                                            label="folate_serum" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].free_light_chains : false} onChange={handleChange} name="free_light_chains" />}
                                            label="free light chains" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hba1c : false} onChange={handleChange} name="hba1c" />}
                                            label="hba1c" />
                                    </Grid>
                                    <Grid item xs={12} sm={3}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].immunoglobulin : false} onChange={handleChange} name="immunoglobulin" />}
                                            label="immunoglobulin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].iron_transferrin : false} onChange={handleChange} name="iron_transferrin" />}
                                            label="iron transferrin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].lactate : false} onChange={handleChange} name="lactate" />}
                                            label="lactate" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].ldh : false} onChange={handleChange} name="ldh" />}
                                            label="ldh" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].lft : false} onChange={handleChange} name="lft" />}
                                            label="lft" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].lipase : false} onChange={handleChange} name="lipase" />}
                                            label="lipase" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].magnessium : false} onChange={handleChange} name="magnessium" />}
                                            label="magnessium" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].phosphate : false} onChange={handleChange} name="phosphate" />}
                                            label="phosphate" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].pleural_ascitic_synovial_fluid : false} onChange={handleChange} name="pleural_ascitic_synovial_fluid" />}
                                            label="pleural / ascitic / synovial fluid - total protein, glucose, ldh, amylase, cholesterol" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].protein_electrophoresis : false} onChange={handleChange} name="protein_electrophoresis" />}
                                            label="protein electrophoresis" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].serum_calcium_corrected : false} onChange={handleChange} name="serum_calcium_corrected" />}
                                            label="serum calcium corrected" />
                                    </Grid>
                                    <Grid item xs={12} sm={3}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].serum_calcium_ionised : false} onChange={handleChange} name="serum_calcium_ionised" />}
                                            label="serum calcium ionized" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].serum_iron : false} onChange={handleChange} name="serum_iron" />}
                                            label="serum iron" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].total_protein : false} onChange={handleChange} name="total_protein" />}
                                            label="total protein" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].total_bilirubin : false} onChange={handleChange} name="total_bilirubin" />}
                                            label="total bilirubin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].transferrin : false} onChange={handleChange} name="transferrin" />}
                                            label="transferrin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].troponin_i : false} onChange={handleChange} name="troponin_i" />}
                                            label="troponin i" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].troponin_t : false} onChange={handleChange} name="troponin_t" />}
                                            label="troponin t" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].u_microalbumin_creatinine_ratio : false} onChange={handleChange} name="u_microalbumin_creatinine_ratio" />}
                                            label="u microalbumin creatinine ratio" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].uric_acid : false} onChange={handleChange} name="uric_acid" />}
                                            label="uric acid" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].urine_reducing_substance : false} onChange={handleChange} name="urine_reducing_substance" />}
                                            label="urine reducing substance" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].vitamin_b12 : false} onChange={handleChange} name="vitamin_b12" />}
                                            label="vitamin b12" />
                                    </Grid>
                                </Grid>

                                <h3>2. haematology</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={6}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bf_for_mps : false} onChange={handleChange} name="bf_for_mps" />}
                                            label="bf for mps" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].blood_group : false} onChange={handleChange} name="blood_group" />}
                                            label="blood group rh antigen" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].direct_anti_human_globulin : false} onChange={handleChange} name="direct_anti_human_globulin" />}
                                            label="direct anti human globulin" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].esr : false} onChange={handleChange} name="esr" />}
                                            label="esr" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].fbc_blood_film_comment : false} onChange={handleChange} name="fbc_blood_film_comment" />}
                                            label="fbc blood film comment" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].full_blood_count : false} onChange={handleChange} name="full_blood_count" />}
                                            label="full blood count (fbc)" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].g6pd_qualitative : false} onChange={handleChange} name="g6pd_qualitative" />}
                                            label="g6pd qualitative" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hb_electrophoresis : false} onChange={handleChange} name="hb_electrophoresis" />}
                                            label="hb electrophoresis" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].indirect_anti_human_globulin : false} onChange={handleChange} name="indirect_anti_human_globulin" />}
                                            label="indirect anti human globulin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].mononucleosis_spot : false} onChange={handleChange} name="mononucleosis_spot" />}
                                            label="mononucleosis spot - Paul Bunnel" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].reticulocytes_count : false} onChange={handleChange} name="reticulocytes_count" />}
                                            label="reticulocytes count" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].sickling_test : false} onChange={handleChange} name="sickling_test" />}
                                            label="sickling test" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].trophozoites_count : false} onChange={handleChange} name="trophozoites_count" />}
                                            label="trophozoites count" />
                                    </Grid>
                                </Grid>

                                <h3>3. coagulation</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={6}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].anti_ccp : false} onChange={handleChange} name="anti_ccp" />}
                                            label="anti ccp" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].anti_thrombin_iii_functional : false} onChange={handleChange} name="anti_thrombin_iii_functional" />}
                                            label="anti thrombin iii functional" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bleeding_time : false} onChange={handleChange} name="bleeding_time" />}
                                            label="bleeding time" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].clotting_profile : false} onChange={handleChange} name="clotting_profile" />}
                                            label="clotting profile" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].clotting_time : false} onChange={handleChange} name="clotting_time" />}
                                            label="clotting time" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].d_dimer : false} onChange={handleChange} name="d_dimer" />}
                                            label="d - dimer" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].factor_8 : false} onChange={handleChange} name="factor_8" />}
                                            label="factor 8" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].factor_9 : false} onChange={handleChange} name="factor_9" />}
                                            label="factor 9" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].fibrinogen : false} onChange={handleChange} name="fibrinogen" />}
                                            label="fibrinogen" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].protein_c : false} onChange={handleChange} name="protein_c" />}
                                            label="protein c" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].protein_s : false} onChange={handleChange} name="protein_s" />}
                                            label="protein s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].prothrombin_time : false} onChange={handleChange} name="prothrombin_time" />}
                                            label="prothrombin time (pt) - inr" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].thromboplastin_time : false} onChange={handleChange} name="thromboplastin_time" />}
                                            label="thromboplastin time (aptt)" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].von_willibrands_factor : false} onChange={handleChange} name="von_willibrands_factor" />}
                                            label="von willibrands factor" />
                                    </Grid>
                                </Grid>

                                <h3>4. parasitology/microbiology</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].blood_cs : false} onChange={handleChange} name="blood_cs" />}
                                            label="blood c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].cervical_swab : false} onChange={handleChange} name="cervical_swab" />}
                                            label="cervical swab for c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].corneal_scrapping : false} onChange={handleChange} name="corneal_scrapping" />}
                                            label="corneal scrapping for c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].csf_bacteriology : false} onChange={handleChange} name="csf_bacteriology" />}
                                            label="csf bacteriology" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].ear_swab_cs : false} onChange={handleChange} name="ear_swab_cs" />}
                                            label="ear swab for cs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].eye_swab_cs : false} onChange={handleChange} name="eye_swab_cs" />}
                                            label="eye swab for cs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].endocervical_swab : false} onChange={handleChange} name="endocervical_swab" />}
                                            label="endocervical swab for c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].h_pylori_antibodies : false} onChange={handleChange} name="h_pylori_antibodies" />}
                                            label="h pylori antibodies" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].h_pylori_antigen : false} onChange={handleChange} name="h_pylori_antigen" />}
                                            label="h pylori antigen" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hvs_cs : false} onChange={handleChange} name="hvs_cs" />}
                                            label="hvs c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hvs_re : false} onChange={handleChange} name="hvs_re" />}
                                            label="hvs r/e" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].semen_cs : false} onChange={handleChange} name="semen_cs" />}
                                            label="semen c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].skin_scraping_culture : false} onChange={handleChange} name="skin_scraping_culture" />}
                                            label="skin scraping culture" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].skin_scraping_fungal_elements : false} onChange={handleChange} name="skin_scraping_fungal_elements" />}
                                            label="skin scraping fungal elements" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].stool_cs : false} onChange={handleChange} name="stool_cs" />}
                                            label="stool c/s" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].stool_for_rota_and_adnoviruses : false} onChange={handleChange} name="stool_for_rota_and_adnoviruses" />}
                                            label="stool for rota and adnoviruses" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].stool_occult_blood_test : false} onChange={handleChange} name="stool_occult_blood_test" />}
                                            label="stool occult blood test" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].stool_re : false} onChange={handleChange} name="stool_re" />}
                                            label="stool r/e" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].sputum_afb : false} onChange={handleChange} name="sputum_afb" />}
                                            label="sputum  for afb" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].sputum_cs : false} onChange={handleChange} name="sputum_cs" />}
                                            label="sputum  for cs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].throat_swab_cs : false} onChange={handleChange} name="throat_swab_cs" />}
                                            label="throat swab  for cs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].urethral_swab_cs : false} onChange={handleChange} name="urethral_swab_cs" />}
                                            label="urethral swab  for cs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].urethral_swab_gram_stain : false} onChange={handleChange} name="urethral_swab_gram_stain" />}
                                            label="urethral swab for gram stain" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].urine_cs : false} onChange={handleChange} name="urine_cs" />}
                                            label="urine cs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].urine_re : false} onChange={handleChange} name="urine_re" />}
                                            label="urine re" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].widal_test : false} onChange={handleChange} name="widal_test" />}
                                            label="widal test" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].wound_swab_cs : false} onChange={handleChange} name="wound_swab_cs" />}
                                            label="wound swab for cs" />
                                    </Grid>
                                </Grid>

                                <h3>5. infectious diseases</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].anti_streptplysin_o : false} onChange={handleChange} name="anti_streptplysin_o" />}
                                            label="anti streptplysin o" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bilhazia_antibody : false} onChange={handleChange} name="bilhazia_antibody" />}
                                            label="bilhazia antibody IGG And igm" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].bilhazia_antigen : false} onChange={handleChange} name="bilhazia_antigen" />}
                                            label="bilhazia antigen urine serum" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].chlamydia_abs : false} onChange={handleChange} name="chlamydia_abs" />}
                                            label="chlamydia abs" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].cmv : false} onChange={handleChange} name="cmv" />}
                                            label="cmv - igg and igm" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].gonorrhoea_ab : false} onChange={handleChange} name="gonorrhoea_ab" />}
                                            label="gonorrhoea ab" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hepatitis_a : false} onChange={handleChange} name="hepatitis_a" />}
                                            label="hepatitis a" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hepatitis_b_profile : false} onChange={handleChange} name="hepatitis_b_profile" />}
                                            label="hepatitis b profile" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hepatitis_b_screen : false} onChange={handleChange} name="hepatitis_b_screen" />}
                                            label="hepatitis b screen" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hepatitis_b_viral_load : false} onChange={handleChange} name="hepatitis_b_viral_load" />}
                                            label="hepatitis b viral load" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hepatitis_c_screen : false} onChange={handleChange} name="hepatitis_c_screen" />}
                                            label="hepatitis c screen" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hepatitis_c_viral_load : false} onChange={handleChange} name="hepatitis_c_viral_load" />}
                                            label="hepatitis c viral load" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].hiv_viral_load : false} onChange={handleChange} name="hiv_viral_load" />}
                                            label="hiv viral load" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].retro_screen : false} onChange={handleChange} name="retro_screen" />}
                                            label="retro screen" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].retro_screen_confirmation : false} onChange={handleChange} name="retro_screen_confirmation" />}
                                            label="retro screen confirmation" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].rubella : false} onChange={handleChange} name="rubella" />}
                                            label="rubella igg amd igm" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].syphilis_profile : false} onChange={handleChange} name="syphilis_profile" />}
                                            label="syphilis profile vdrl t. pallidium and igm" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].t_pallidium_latex : false} onChange={handleChange} name="t_pallidium_latex" />}
                                            label="t. pallidium latex" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].t_pallidium_antibody : false} onChange={handleChange} name="t_pallidium_antibody" />}
                                            label="t. pallidium antibody" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].toxo : false} onChange={handleChange} name="toxo" />}
                                            label="toxo - igg and igm" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].vdrl : false} onChange={handleChange} name="vdrl" />}
                                            label="vdrl" />
                                    </Grid>
                                </Grid>

                                <h3>6. endocrinology</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].ft3 : false} onChange={handleChange} name="ft3" />}
                                            label="ft3" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].ft4 : false} onChange={handleChange} name="ft4" />}
                                            label="ft4" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].thyroglobin_antibody : false} onChange={handleChange} name="thyroglobin_antibody" />}
                                            label="thyroglobin antibody" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].thyroid_auto_antibodies : false} onChange={handleChange} name="thyroid_auto_antibodies" />}
                                            label="thyroid auto antibodies" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].thyroid_function_test : false} onChange={handleChange} name="thyroid_function_test" />}
                                            label="thyroid function test" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].tsh_releasing_receptors_antibody : false} onChange={handleChange} name="tsh_releasing_receptors_antibody" />}
                                            label="tsh releasing receptors antibody" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].tsh : false} onChange={handleChange} name="tsh" />}
                                            label="tsh" />
                                    </Grid>
                                </Grid>

                                <h3>7. fertility hormones</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].seventeen_oh_progesterone : false} onChange={handleChange} name="seventeen_oh_progesterone" />}
                                            label="17 oh progesterone" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].twenty_four_hr_urine_cortisol : false} onChange={handleChange} name="twenty_four_hr_urine_cortisol" />}
                                            label="24hr urine cortisol" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].acetylcholine_receptor_antibody : false} onChange={handleChange} name="acetylcholine_receptor_antibody" />}
                                            label="acetylcholine receptor antibody" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].aldenocortitropic_hormone : false} onChange={handleChange} name="aldenocortitropic_hormone" />}
                                            label="aldenocortitropic hormone (acth)" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].aldosterone : false} onChange={handleChange} name="aldosterone" />}
                                            label="aldosterone" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].angiotensin_converting_enzymes : false} onChange={handleChange} name="angiotensin_converting_enzymes" />}
                                            label="angiotensin converting enzymes (ACE)" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].antimulerian_hormone : false} onChange={handleChange} name="antimulerian_hormone" />}
                                            label="antimulerian hormone" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].cortisol : false} onChange={handleChange} name="cortisol" />}
                                            label="cortisol - blood" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].dheas : false} onChange={handleChange} name="dheas" />}
                                            label="dheas" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].estrogen : false} onChange={handleChange} name="estrogen" />}
                                            label="estrogen" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].estrol : false} onChange={handleChange} name="estrol" />}
                                            label="estrol -e3" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].female_fertility_hormonal_assay : false} onChange={handleChange} name="female_fertility_hormonal_assay" />}
                                            label="female fertility hormonal assay" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].male_fertility_hormonal_assay : false} onChange={handleChange} name="male_fertility_hormonal_assay" />}
                                            label="male fertility hormonal assay" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].free_testosterone : false} onChange={handleChange} name="free_testosterone" />}
                                            label="free testosterone" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].fsh : false} onChange={handleChange} name="fsh" />}
                                            label="fsh" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].growth_hormone : false} onChange={handleChange} name="growth_hormone" />}
                                            label="growth hormone - fasting random" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].lh : false} onChange={handleChange} name="lh" />}
                                            label="lh" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].oestradiol : false} onChange={handleChange} name="oestradiol" />}
                                            label="oestradiol" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].parathyroid_hormone : false} onChange={handleChange} name="parathyroid_hormone" />}
                                            label="parathyroid hormone (pth)" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].progesterone : false} onChange={handleChange} name="progesterone" />}
                                            label="progesterone" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].prolactin : false} onChange={handleChange} name="prolactin" />}
                                            label="prolactin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].semen_analysis : false} onChange={handleChange} name="semen_analysis" />}
                                            label="semen analysis" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].semen_antibodies : false} onChange={handleChange} name="semen_antibodies" />}
                                            label="semen antibodies" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].sex_hormone_binding_globulin : false} onChange={handleChange} name="sex_hormone_binding_globulin" />}
                                            label="sex hormone binding globulin" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].testosterone : false} onChange={handleChange} name="testosterone" />}
                                            label="testosterone" />
                                    </Grid>
                                </Grid>

                                <h3>8. tumour markers</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={6}>
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].afp : false} onChange={handleChange} name="afp" />}
                                            label="afp" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].ca_125 : false} onChange={handleChange} name="ca_125" />}
                                            label="ca 125" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].ca_153 : false} onChange={handleChange} name="ca_153" />}
                                            label="ca 153" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].ca_199 : false} onChange={handleChange} name="ca_199" />}
                                            label="ca 19.9" />
                                    </Grid>
                                    <Grid item xs={12} sm={6}>
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].cea : false} onChange={handleChange} name="cea" />}
                                            label="cea" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].crp : false} onChange={handleChange} name="crp" />}
                                            label="crp" />
                                        <FormControlLabel
                                            className="text-uppercase"
                                            control={<Checkbox checked={values[0] ? values[0].psa : false} onChange={handleChange} name="psa" />}
                                            label="psa" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].total_b_hcg : false} onChange={handleChange} name="total_b_hcg" />}
                                            label="total bhcg - blood quanlitative" />
                                    </Grid>
                                </Grid>

                                <h3>9. ultrasound scan</h3>
                                <Grid container spacing={3}>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].abdominal_scan : false} onChange={handleChange} name="abdominal_scan" />}
                                            label="abdominal scan" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].abdominal_pelvic_scan : false} onChange={handleChange} name="abdominal_pelvic_scan" />}
                                            label="abdominal pelvic scan" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].breast_scan : false} onChange={handleChange} name="breast_scan" />}
                                            label="breast scan" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].obstetric_scan : false} onChange={handleChange} name="obstetric_scan" />}
                                            label="obstetric scan" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].pelvic_scan_gynaecology : false} onChange={handleChange} name="pelvic_scan_gynaecology" />}
                                            label="pelvic scan gynaecology" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].pelvic_scan_urology : false} onChange={handleChange} name="pelvic_scan_urology" />}
                                            label="pelvic scan urology" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].prostate_scan : false} onChange={handleChange} name="prostate_scan" />}
                                            label="prostate scan" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].scrotal_scan : false} onChange={handleChange} name="scrotal_scan" />}
                                            label="scrotal scan" />
                                    </Grid>
                                    <Grid item xs={12} sm={4}>
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].superficial_swellings : false} onChange={handleChange} name="superficial_swellings" />}
                                            label="superficial swellings" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].thyroid_scan_anterior_neck_swelling : false} onChange={handleChange} name="thyroid_scan_anterior_neck_swelling" />}
                                            label="thyroid scan anterior neck swelling" />
                                        <FormControlLabel
                                            control={<Checkbox checked={values[0] ? values[0].other_small_parts : false} onChange={handleChange} name="other_small_parts" />}
                                            label="other small parts" />
                                    </Grid>
                                </Grid>
                            </FormGroup>
                            { formTouched && !formValid && <FormHelperText>You Need To Select At Least One</FormHelperText> }
                        </FormControl>
                    </form>
                </DialogContent>
                <DialogActions>
                    <Tippy content="Reset Form">
                        <Button
                            onClick={reset}
                            color="secondary">
                            Reset
                        </Button>
                    </Tippy>
                    <Tippy content="Update Request">
                        <Button
                            onClick={onConfirm}
                            disabled={!formValid}
                            color="primary">
                            Update Request
                        </Button>
                    </Tippy>
                </DialogActions>
            </Dialog>
        </>
    );
}

export default EditRequest;
