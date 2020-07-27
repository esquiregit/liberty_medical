import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import EditAntenatalScreening from '../Labs/Immunology/EditAntenatalScreening';
import EditCD4Count from '../Labs/Immunology/EditCD4Count';
import EditGeneralSerology from '../Labs/Immunology/EditGeneralSerology';
import EditHBVViralLoad from '../Labs/Immunology/EditHBVViralLoad';
import EditHepatitisBProfile from '../Labs/Immunology/EditHepatitisBProfile';
import EditHepatitisMarkers from '../Labs/Immunology/EditHepatitisMarkers';
import EditHIVViralLoad from '../Labs/Immunology/EditHIVViralLoad';
import EditHPyloriAg from '../Labs/Immunology/EditHPyloriAg';
import EditHPyloriAgBlood from '../Labs/Immunology/EditHPyloriAgBlood';
import EditHPyloriAgSOB from '../Labs/Immunology/EditHPyloriAgSOB';
import EditMantoux from '../Labs/Immunology/EditMantoux';
import EditPregnancyTest from '../Labs/Immunology/EditPregnancyTest';
import EditRheumatology from '../Labs/Immunology/EditRheumatology';
import EditSemenAnalysis from '../Labs/Immunology/EditSemenAnalysis';
import EditWidal from '../Labs/Immunology/EditWidal';

const ImmunologyTab = ({ lab }) => {
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
            { antenatalScreening && <EditAntenatalScreening lab={lab} closeModal={closeModal} /> }
            { cd4Count && <EditCD4Count lab={lab} closeModal={closeModal} /> }
            { generalSerology && <EditGeneralSerology lab={lab} closeModal={closeModal} /> }
            { hbvViralLoad && <EditHBVViralLoad lab={lab} closeModal={closeModal} /> }
            { hepatitisBProfile && <EditHepatitisBProfile lab={lab} closeModal={closeModal} /> }
            { hepatitisMarkers && <EditHepatitisMarkers lab={lab} closeModal={closeModal} /> }
            { hivViralLoad     && <EditHIVViralLoad     lab={lab} closeModal={closeModal} /> }
            { hPyloriAg  && <EditHPyloriAg  lab={lab} closeModal={closeModal} /> }
            { hPyloriAgBlood && <EditHPyloriAgBlood lab={lab} closeModal={closeModal} /> }
            { hPyloriAgSOB && <EditHPyloriAgSOB lab={lab} closeModal={closeModal} /> }
            { mantoux && <EditMantoux lab={lab} closeModal={closeModal} /> }
            { pregnancyTest && <EditPregnancyTest lab={lab} closeModal={closeModal} /> }
            { rheumatology && <EditRheumatology lab={lab} closeModal={closeModal} /> }
            { semenAnalysis && <EditSemenAnalysis lab={lab} closeModal={closeModal} /> }
            { widal && <EditWidal lab={lab} closeModal={closeModal} /> }
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
