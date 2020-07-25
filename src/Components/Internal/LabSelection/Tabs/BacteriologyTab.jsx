import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import AddAsciticFluidCS from '../Labs/Bacteriology/AddAsciticFluidCS';
import AddAspirateCS from '../Labs/Bacteriology/AddAspirateCS';
import AddBloodCS from '../Labs/Bacteriology/AddBloodCS';
import AddEarSwabCS from '../Labs/Bacteriology/AddEarSwabCS';
import AddEndocervicalSwab from '../Labs/Bacteriology/AddEndocervicalSwab';
import AddEyeSwabCS from '../Labs/Bacteriology/AddEyeSwabCS';
import AddHVSCS from '../Labs/Bacteriology/AddHVSCS';
import AddHVSRE from '../Labs/Bacteriology/AddHVSRE';
import AddPleuralFluid from '../Labs/Bacteriology/AddPleuralFluid';
import AddPusFluid from '../Labs/Bacteriology/AddPusFluid';
import AddSemenCS from '../Labs/Bacteriology/AddSemenCS';
import AddSkinSnip from '../Labs/Bacteriology/AddSkinSnip';
import AddSputumAFB from '../Labs/Bacteriology/AddSputumAFB';
import AddSputumCS from '../Labs/Bacteriology/AddSputumCS';
import AddStoolCS from '../Labs/Bacteriology/AddStoolCS';
import AddStoolRE from '../Labs/Bacteriology/AddStoolRE';
import AddThroatSwabCS from '../Labs/Bacteriology/AddThroatSwabCS';
import AddUrethralCS from '../Labs/Bacteriology/AddUrethralCS';
import AddUrineCS from '../Labs/Bacteriology/AddUrineCS';
import AddUrineRE from '../Labs/Bacteriology/AddUrineRE';
import AddWoundCS from '../Labs/Bacteriology/AddWoundCS';

const BacteriologyTab = ({ patient }) => {
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
        } else if(modal.toLowerCase() === 'sputumcs') {
            setSputumAFB(false);
        } else if(modal.toLowerCase() === 'sputumafb') {
            setSputumCS(false);
        } else if(modal.toLowerCase() === 'stoolcs') {
            setStoolCS(false);
        } else if(modal.toLowerCase() === 'throatswabcs') {
            setStoolRE(false);
        } else if(modal.toLowerCase() === 'urethralcs') {
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
            { bloodCS                 && <AddBloodCS patient={patient} closeModal={closeModal} /> }
            { earSwabCS              && <AddEarSwabCS patient={patient} closeModal={closeModal} /> }
            { endocervicalSwab             && <AddEndocervicalSwab patient={patient} closeModal={closeModal} /> }
            { hvsCS             && <AddHVSCS patient={patient} closeModal={closeModal} /> }
            { asciticFluid          && <AddAsciticFluidCS patient={patient} closeModal={closeModal} /> }
            { pleuralFluid          && <AddPleuralFluid patient={patient} closeModal={closeModal} /> }
            { hvsRE         && <AddHVSRE  patient={patient} closeModal={closeModal} /> }
            { eyeSwabCS       && <AddEyeSwabCS patient={patient} closeModal={closeModal} /> }
            { aspirateCS      && <AddAspirateCS patient={patient} closeModal={closeModal} /> }
            { pusFluid              && <AddPusFluid patient={patient} closeModal={closeModal} /> }
            { semenCS       && <AddSemenCS patient={patient} closeModal={closeModal} /> }
            { skinSnip                  && <AddSkinSnip patient={patient} closeModal={closeModal} /> }
            { sputumAFB                    && <AddSputumAFB patient={patient} closeModal={closeModal} /> }
            { sputumCS              && <AddSputumCS patient={patient} closeModal={closeModal} /> }
            { stoolCS                    && <AddStoolCS patient={patient} closeModal={closeModal} /> }
            { stoolRE           && <AddStoolRE patient={patient} closeModal={closeModal} /> }
            { throatSwabCS                 && <AddThroatSwabCS patient={patient} closeModal={closeModal} /> }
            { urethralCS                  && <AddUrethralCS patient={patient} closeModal={closeModal} /> }
            { urineRE       && <AddUrineRE patient={patient} closeModal={closeModal} /> }
            { urineCS               && <AddUrineCS patient={patient} closeModal={closeModal} /> }
            { woundCS            && <AddWoundCS patient={patient} closeModal={closeModal} /> }
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
