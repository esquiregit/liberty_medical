import React, { useState } from 'react';
import EditPSA from '../Labs/Hormonal/EditPSA';
import EditPTH from '../Labs/Hormonal/EditPTH';
import EditTFT from '../Labs/Hormonal/EditTFT';
import Button from '@material-ui/core/Button';
import EditCortisol from '../Labs/Hormonal/EditCortisol';
import EditEstrogen from '../Labs/Hormonal/EditEstrogen';
import EditTroponin from '../Labs/Hormonal/EditTroponin';
import EditHormonalAssay from '../Labs/Hormonal/EditHormonalAssay';
import EditAlphaFetoProtein from '../Labs/Hormonal/EditAlphaFetoProtein';
import EditReproductiveAssay from '../Labs/Hormonal/EditReproductiveAssay';

const HormonesTab = ({ lab }) => {
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
            { psa && <EditPSA lab={lab} closeModal={closeModal} /> }
            { pth && <EditPTH lab={lab} closeModal={closeModal} /> }
            { tft && <EditTFT lab={lab} closeModal={closeModal} /> }
            { cortisol && <EditCortisol lab={lab} closeModal={closeModal} /> }
            { estrogen && <EditEstrogen lab={lab} closeModal={closeModal} /> }
            { troponin && <EditTroponin lab={lab} closeModal={closeModal} /> }
            { hormonalAssay     && <EditHormonalAssay     lab={lab} closeModal={closeModal} /> }
            { alphaFetoProtein  && <EditAlphaFetoProtein  lab={lab} closeModal={closeModal} /> }
            { reproductiveAssay && <EditReproductiveAssay lab={lab} closeModal={closeModal} /> }
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
