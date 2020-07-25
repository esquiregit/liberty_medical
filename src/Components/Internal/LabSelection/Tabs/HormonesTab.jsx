import React, { useState } from 'react';
import AddPSA from '../Labs/Hormonal/AddPSA';
import AddPTH from '../Labs/Hormonal/AddPTH';
import AddTFT from '../Labs/Hormonal/AddTFT';
import Button from '@material-ui/core/Button';
import AddCortisol from '../Labs/Hormonal/AddCortisol';
import AddEstrogen from '../Labs/Hormonal/AddEstrogen';
import AddTroponin from '../Labs/Hormonal/AddTroponin';
import AddHormonalAssay from '../Labs/Hormonal/AddHormonalAssay';
import AddAlphaFetoProtein from '../Labs/Hormonal/AddAlphaFetoProtein';
import AddReproductiveAssay from '../Labs/Hormonal/AddReproductiveAssay';

const HormonesTab = ({ patient }) => {
    const [psa, setPSA] = useState(false);
    const [pth, setPTH] = useState(false);
    const [tft, setTFT] = useState(false);
    const [cortisol, setCortisol] = useState(false);
    const [estrogen, setEstrogen] = useState(false);
    const [troponin, setTroponin] = useState(false);
    const [hormonalAssay, setHormonalAssay]         = useState(false);
    const [alphaFetoProtein, setAlphaFetoProtein]   = useState(false);
    const [reproductiveAssay, setReproductiveAssay] = useState(false);

    const closeModal = modal => {
        if(modal.toLowerCase() === 'psa') {
            setPSA(false);
        } else if(modal.toLowerCase() === 'pth') {
            setPTH(false);
        } else if(modal.toLowerCase() === 'tft') {
            setTFT(false);
        } else if(modal.toLowerCase() === 'cortisol') {
            setCortisol(false);
        } else if(modal.toLowerCase() === 'estrogen') {
            setEstrogen(false);
        } else if(modal.toLowerCase() === 'troponin') {
            setTroponin(false);
        } else if(modal.toLowerCase() === 'hormonalassay') {
            setHormonalAssay(false);
        } else if(modal.toLowerCase() === 'alphafetoprotein') {
            setAlphaFetoProtein(false);
        } else if(modal.toLowerCase() === 'reproductiveassay') {
            setReproductiveAssay(false);
        }
    };

    return (
        <>
            { psa && <AddPSA patient={patient} closeModal={closeModal} /> }
            { pth && <AddPTH patient={patient} closeModal={closeModal} /> }
            { tft && <AddTFT patient={patient} closeModal={closeModal} /> }
            { cortisol && <AddCortisol patient={patient} closeModal={closeModal} /> }
            { estrogen && <AddEstrogen patient={patient} closeModal={closeModal} /> }
            { troponin && <AddTroponin patient={patient} closeModal={closeModal} /> }
            { hormonalAssay     && <AddHormonalAssay     patient={patient} closeModal={closeModal} /> }
            { alphaFetoProtein  && <AddAlphaFetoProtein  patient={patient} closeModal={closeModal} /> }
            { reproductiveAssay && <AddReproductiveAssay patient={patient} closeModal={closeModal} /> }
            <table>
                <tbody>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setAlphaFetoProtein(true)}
                                variant="outlined">
                                Alpha Feto protein
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCortisol(true)}
                                variant="outlined">
                                cortisol
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setEstrogen(true)}
                                variant="outlined">
                                estrogen
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHormonalAssay(true)}
                                variant="outlined">
                                hormonal assay
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setPSA(true)}
                                variant="outlined">
                                PSA
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setPTH(true)}
                                variant="outlined">
                                PTH
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setReproductiveAssay(true)}
                                variant="outlined">
                                reproductive assay
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setTFT(true)}
                                variant="outlined">
                                TFT
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td colSpan="2">
                            <Button
                                fullWidth
                                onClick={() => setTroponin(true)}
                                variant="outlined">
                                troponin
                            </Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </>
    )
}

export default HormonesTab;
