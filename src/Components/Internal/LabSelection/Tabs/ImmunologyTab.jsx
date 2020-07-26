import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import AddAntenatalScreening from '../Labs/Immunology/AddAntenatalScreening';
import AddCD4Count from '../Labs/Immunology/AddCD4Count';
import AddGeneralSerology from '../Labs/Immunology/AddGeneralSerology';
import AddHBVViralLoad from '../Labs/Immunology/AddHBVViralLoad';
import AddHepatitisBProfile from '../Labs/Immunology/AddHepatitisBProfile';
import AddHepatitisMarkers from '../Labs/Immunology/AddHepatitisMarkers';
import AddHIVViralLoad from '../Labs/Immunology/AddHIVViralLoad';
import AddHPyloriAg from '../Labs/Immunology/AddHPyloriAg';
import AddHPyloriAgBlood from '../Labs/Immunology/AddHPyloriAgBlood';
import AddHPyloriAgSOB from '../Labs/Immunology/AddHPyloriAgSOB';
import AddMantoux from '../Labs/Immunology/AddMantoux';
import AddPregnancyTest from '../Labs/Immunology/AddPregnancyTest';
import AddRheumatology from '../Labs/Immunology/AddRheumatology';
import AddSemenAnalysis from '../Labs/Immunology/AddSemenAnalysis';
import AddWidal from '../Labs/Immunology/AddWidal';

const ImmunologyTab = ({ patient }) => {
    const [antenatalScreening, setAntenatalScreening] = useState(false);
    const [cd4Count, setCD4Count] = useState(false);
    const [generalSerology, setGeneralSerology] = useState(false);
    const [hbvViralLoad, setHBVViralLoad] = useState(false);
    const [hepatitisBProfile, setHepatitisBProfile] = useState(false);
    const [hepatitisMarkers, setHepatitisMarkers] = useState(false);
    const [hivViralLoad, setHIVViralLoad]         = useState(false);
    const [hPyloriAg, setHPyloriAg]   = useState(false);
    const [hPyloriAgBlood, setHPyloriAgBlood] = useState(false);
    const [hPyloriAgSOB, setHPyloriAgSOB] = useState(false);
    const [mantoux, setMantoux] = useState(false);
    const [pregnancyTest, setPregnancyTest] = useState(false);
    const [rheumatology, setRheumatology] = useState(false);
    const [semenAnalysis, setSemenAnalysis] = useState(false);
    const [widal, setWidal] = useState(false);

    const closeModal = modal => {
        if(modal.toLowerCase() === 'antenatalscreening') {
            setAntenatalScreening(false);
        } else if(modal.toLowerCase() === 'cd4count') {
            setCD4Count(false);
        } else if(modal.toLowerCase() === 'generalserology') {
            setGeneralSerology(false);
        } else if(modal.toLowerCase() === 'hbvviralload') {
            setHBVViralLoad(false);
        } else if(modal.toLowerCase() === 'hepatitisbprofile') {
            setHepatitisBProfile(false);
        } else if(modal.toLowerCase() === 'hepatitismarkers') {
            setHepatitisMarkers(false);
        } else if(modal.toLowerCase() === 'hivviralload') {
            setHIVViralLoad(false);
        } else if(modal.toLowerCase() === 'hpyloriag') {
            setHPyloriAg(false);
        } else if(modal.toLowerCase() === 'hpyloriagblood') {
            setHPyloriAgBlood(false);
        } else if(modal.toLowerCase() === 'hpyloriagsob') {
            setHPyloriAgSOB(false);
        } else if(modal.toLowerCase() === 'mantoux') {
            setMantoux(false);
        } else if(modal.toLowerCase() === 'pregnancytest') {
            setPregnancyTest(false);
        } else if(modal.toLowerCase() === 'rheumatology') {
            setRheumatology(false);
        } else if(modal.toLowerCase() === 'semenanalysis') {
            setSemenAnalysis(false);
        } else if(modal.toLowerCase() === 'widal') {
            setWidal(false);
        }
    };

    return (
        <>
            { antenatalScreening && <AddAntenatalScreening patient={patient} closeModal={closeModal} /> }
            { cd4Count && <AddCD4Count patient={patient} closeModal={closeModal} /> }
            { generalSerology && <AddGeneralSerology patient={patient} closeModal={closeModal} /> }
            { hbvViralLoad && <AddHBVViralLoad patient={patient} closeModal={closeModal} /> }
            { hepatitisBProfile && <AddHepatitisBProfile patient={patient} closeModal={closeModal} /> }
            { hepatitisMarkers && <AddHepatitisMarkers patient={patient} closeModal={closeModal} /> }
            { hivViralLoad     && <AddHIVViralLoad     patient={patient} closeModal={closeModal} /> }
            { hPyloriAg  && <AddHPyloriAg  patient={patient} closeModal={closeModal} /> }
            { hPyloriAgBlood && <AddHPyloriAgBlood patient={patient} closeModal={closeModal} /> }
            { hPyloriAgSOB && <AddHPyloriAgSOB patient={patient} closeModal={closeModal} /> }
            { mantoux && <AddMantoux patient={patient} closeModal={closeModal} /> }
            { pregnancyTest && <AddPregnancyTest patient={patient} closeModal={closeModal} /> }
            { rheumatology && <AddRheumatology patient={patient} closeModal={closeModal} /> }
            { semenAnalysis && <AddSemenAnalysis patient={patient} closeModal={closeModal} /> }
            { widal && <AddWidal patient={patient} closeModal={closeModal} /> }
            <table>
                <tbody>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setAntenatalScreening(true)}
                                variant="outlined">
                                antenatal screening
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCD4Count(true)}
                                variant="outlined">
                                CD4 count
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setGeneralSerology(true)}
                                variant="outlined">
                                general Serology
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHPyloriAg(true)}
                                variant="outlined">
                                h. pylori Ag.
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHPyloriAgSOB(true)}
                                variant="outlined">
                                h. pylori Ag. SOB
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHPyloriAgBlood(true)}
                                variant="outlined">
                                h. pylori Ag. Blood
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHBVViralLoad(true)}
                                variant="outlined">
                                HBV viral load
                            </Button>
                        </td>
                        <td>
                        <Button
                                fullWidth
                                onClick={() => setHIVViralLoad(true)}
                                variant="outlined">
                                HIV viral load
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHepatitisBProfile(true)}
                                variant="outlined">
                                hepatitis B Profile
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHepatitisMarkers(true)}
                                variant="outlined">
                                hepatitis Markers
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setMantoux(true)}
                                variant="outlined">
                                mantoux
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setPregnancyTest(true)}
                                variant="outlined">
                                pregnancy Test
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setRheumatology(true)}
                                variant="outlined">
                                rheumatology
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSemenAnalysis(true)}
                                variant="outlined">
                                semen analysis
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td colSpan="2">
                            <Button
                                fullWidth
                                onClick={() => setWidal(true)}
                                variant="outlined">
                                widal
                            </Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </>
    )
}

export default ImmunologyTab;
