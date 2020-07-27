import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import EditAsciticFluidCS from '../Labs/Bacteriology/EditAsciticFuidCS';
import EditAspirateCS from '../Labs/Bacteriology/EditAspirateCS';
import EditBloodCS from '../Labs/Bacteriology/EditBloodCS';
import EditEarSwabCS from '../Labs/Bacteriology/EditEarSwabCS';
import EditEndocervicalSwab from '../Labs/Bacteriology/EditEndocervicalSwab';
import EditEyeSwabCS from '../Labs/Bacteriology/EditEyeSwabCS';
import EditHVSCS from '../Labs/Bacteriology/EditHVSCS';
import EditHVSRE from '../Labs/Bacteriology/EditHVSRE';
import EditPleuralFluid from '../Labs/Bacteriology/EditPleuralFluid';
import EditPusFluid from '../Labs/Bacteriology/EditPusFluid';
import EditSemenCS from '../Labs/Bacteriology/EditSemenCS';
import EditSkinSnip from '../Labs/Bacteriology/EditSkinSnip';
import EditSputumAFB from '../Labs/Bacteriology/EditSputumAFB';
import EditSputumCS from '../Labs/Bacteriology/EditSputumCS';
import EditStoolCS from '../Labs/Bacteriology/EditStoolCS';
import EditStoolRE from '../Labs/Bacteriology/EditStoolRE';
import EditThroatSwabCS from '../Labs/Bacteriology/EditThroatSwabCS';
import EditUrethralCS from '../Labs/Bacteriology/EditUrethralCS';
import EditUrineCS from '../Labs/Bacteriology/EditUrineCS';
import EditUrineRE from '../Labs/Bacteriology/EditUrineRE';
import EditWoundCS from '../Labs/Bacteriology/EditWoundCS';

const BacteriologyTab = ({ lab }) => {
    const [asciticFluid, setAsciticFluid] = useState(false);
    const [aspirateCS, setAspirateCS] = useState(false);
    const [bloodCS, setBloodCS] = useState(false);
    const [earSwabCS, setEarSwabCS] = useState(false);
    const [endocervicalSwab, setEndocervicalSwab] = useState(false);
    const [eyeSwabCS, setEyeSwabCS] = useState(false);
    const [hvsCS, setHVSCS] = useState(false);
    const [hvsRE, setHVSRE]   = useState(false);
    const [pleuralFluid, setPleuralFluid] = useState(false);
    const [pusFluid, setPusFluid] = useState(false);
    const [semenCS, setSemenCS] = useState(false);
    const [skinSnip, setSkinSnip] = useState(false);
    const [sputumAFB, setSputumAFB] = useState(false);
    const [sputumCS, setSputumCS] = useState(false);
    const [stoolCS, setStoolCS] = useState(false);
    const [stoolRE, setStoolRE] = useState(false);
    const [throatSwabCS, setThroatSwabCS] = useState(false);
    const [urethralCS, setUrethralCS] = useState(false);
    const [urineCS, setUrineCS] = useState(false);
    const [urineRE, setUrineRE] = useState(false);
    const [woundCS, setWoundCS] = useState(false);

    const closeModal = modal => {
        if(modal.toLowerCase() === 'asciticfluidcs') {
            setAsciticFluid(false);
        } else if(modal.toLowerCase() === 'aspiratefluidcs') {
            setAspirateCS(false);
        } else if(modal.toLowerCase() === 'bloodcs') {
            setBloodCS(false);
        } else if(modal.toLowerCase() === 'earswabcs') {
            setEarSwabCS(false);
        } else if(modal.toLowerCase() === 'endocervicalswab') {
            setEndocervicalSwab(false);
        } else if(modal.toLowerCase() === 'eyeswabcs') {
            setEyeSwabCS(false);
        } else if(modal.toLowerCase() === 'hvscs') {
            setHVSCS(false);
        } else if(modal.toLowerCase() === 'hvsre') {
            setHVSRE(false);
        } else if(modal.toLowerCase() === 'pleuralfluid') {
            setPleuralFluid(false);
        } else if(modal.toLowerCase() === 'pusfluid') {
            setPusFluid(false);
        } else if(modal.toLowerCase() === 'semencs') {
            setSemenCS(false);
        } else if(modal.toLowerCase() === 'skinSnip') {
            setSkinSnip(false);
        } else if(modal.toLowerCase() === 'sputumafb') {
            setSputumAFB(false);
        } else if(modal.toLowerCase() === 'sputumcs') {
            setSputumCS(false);
        } else if(modal.toLowerCase() === 'stoolcs') {
            setStoolCS(false);
        } else if(modal.toLowerCase() === 'stoolre') {
            setStoolRE(false);
        } else if(modal.toLowerCase() === 'throatswabcs') {
            setThroatSwabCS(false);
        } else if(modal.toLowerCase() === 'urethralcs') {
            setUrethralCS(false);
        } else if(modal.toLowerCase() === 'urinecs') {
            setUrineCS(false);
        } else if(modal.toLowerCase() === 'urinere') {
            setUrineRE(false);
        } else if(modal.toLowerCase() === 'woundcs') {
            setWoundCS(false);
        }
    };

    return (
        <>
            { bloodCS                 && <EditBloodCS lab={lab} closeModal={closeModal} /> }
            { earSwabCS              && <EditEarSwabCS lab={lab} closeModal={closeModal} /> }
            { endocervicalSwab             && <EditEndocervicalSwab lab={lab} closeModal={closeModal} /> }
            { hvsCS             && <EditHVSCS lab={lab} closeModal={closeModal} /> }
            { asciticFluid          && <EditAsciticFluidCS lab={lab} closeModal={closeModal} /> }
            { pleuralFluid          && <EditPleuralFluid lab={lab} closeModal={closeModal} /> }
            { hvsRE         && <EditHVSRE  lab={lab} closeModal={closeModal} /> }
            { eyeSwabCS       && <EditEyeSwabCS lab={lab} closeModal={closeModal} /> }
            { aspirateCS      && <EditAspirateCS lab={lab} closeModal={closeModal} /> }
            { pusFluid              && <EditPusFluid lab={lab} closeModal={closeModal} /> }
            { semenCS       && <EditSemenCS lab={lab} closeModal={closeModal} /> }
            { skinSnip                  && <EditSkinSnip lab={lab} closeModal={closeModal} /> }
            { sputumAFB                    && <EditSputumAFB lab={lab} closeModal={closeModal} /> }
            { sputumCS              && <EditSputumCS lab={lab} closeModal={closeModal} /> }
            { stoolCS                    && <EditStoolCS lab={lab} closeModal={closeModal} /> }
            { stoolRE           && <EditStoolRE lab={lab} closeModal={closeModal} /> }
            { throatSwabCS                 && <EditThroatSwabCS lab={lab} closeModal={closeModal} /> }
            { urethralCS                  && <EditUrethralCS lab={lab} closeModal={closeModal} /> }
            { urineRE       && <EditUrineRE lab={lab} closeModal={closeModal} /> }
            { urineCS               && <EditUrineCS lab={lab} closeModal={closeModal} /> }
            { woundCS            && <EditWoundCS lab={lab} closeModal={closeModal} /> }
            <table>
                <tbody>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setAsciticFluid(true)}
                                variant="outlined">
                                ascitic Fluid CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setAspirateCS(true)}
                                variant="outlined">
                                aspirate CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBloodCS(true)}
                                variant="outlined">
                                blood CS
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setEarSwabCS(true)}
                                variant="outlined">
                                ear swab CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setEndocervicalSwab(true)}
                                variant="outlined">
                                endocervical swab
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setEyeSwabCS(true)}
                                variant="outlined">
                                eye swab CS
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHVSCS(true)}
                                variant="outlined">
                                HVS CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHVSRE(true)}
                                variant="outlined">
                                HVS RE
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setPleuralFluid(true)}
                                variant="outlined">
                                pleural fluid
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setPusFluid(true)}
                                variant="outlined">
                                pus fluid
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSemenCS(true)}
                                variant="outlined">
                                semen CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSkinSnip(true)}
                                variant="outlined">
                                skin snip
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSputumCS(true)}
                                variant="outlined">
                                sputum CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSputumAFB(true)}
                                variant="outlined">
                                sputum AFB
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setStoolCS(true)}
                                variant="outlined">
                                stool CS
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setStoolRE(true)}
                                variant="outlined">
                                stool RE
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setThroatSwabCS(true)}
                                variant="outlined">
                                throat swab CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setUrethralCS(true)}
                                variant="outlined">
                                urethral CS
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setUrineCS(true)}
                                variant="outlined">
                                urine CS
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setUrineRE(true)}
                                variant="outlined">
                                urine RE
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setWoundCS(true)}
                                variant="outlined">
                                wound CS
                            </Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </>
    )
}

export default BacteriologyTab;
