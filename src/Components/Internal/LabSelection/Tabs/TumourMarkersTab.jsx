import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import AddCA125 from '../Labs/TumourMarkers/AddCA125';
import AddCA153 from '../Labs/TumourMarkers/AddCA153';
import AddCEA from '../Labs/TumourMarkers/AddCEA';
import AddCKMB from '../Labs/TumourMarkers/AddCKMB';
import AddCRP from '../Labs/TumourMarkers/AddCRP';
import AddMAlb from '../Labs/TumourMarkers/AddMAlb';
import AddSerumHCG from '../Labs/TumourMarkers/AddSerumHCG';
import AddCRPUltraSensitive from '../Labs/TumourMarkers/AddCRPUltraSensitive';

const TumourMarkersTab = ({ patient }) => {
    const [ca125, setCA125] = useState(false);
    const [ca153, setCA153] = useState(false);
    const [cea, setCEA] = useState(false);
    const [ckmb, setCKMB] = useState(false);
    const [crp, setCRP] = useState(false);
    const [malb, setMAlb] = useState(false);
    const [serumHCG, setSerumHCG]         = useState(false);
    const [crpUltraSensitive, setCRPUltraSensitive]   = useState(false);

    const closeModal = modal => {
        if(modal.toLowerCase() === 'ca125') {
            setCA125(false);
        } else if(modal.toLowerCase() === 'ca153') {
            setCA153(false);
        } else if(modal.toLowerCase() === 'cea') {
            setCEA(false);
        } else if(modal.toLowerCase() === 'ckmb') {
            setCKMB(false);
        } else if(modal.toLowerCase() === 'crp') {
            setCRP(false);
        } else if(modal.toLowerCase() === 'setmalb') {
            setMAlb(false);
        } else if(modal.toLowerCase() === 'serumhcg') {
            setSerumHCG(false);
        } else if(modal.toLowerCase() === 'crpultrasensitive') {
            setCRPUltraSensitive(false);
        }
    };

    return (
        <>
            { ca125 && <AddCA125 patient={patient} closeModal={closeModal} /> }
            { ca153 && <AddCA153 patient={patient} closeModal={closeModal} /> }
            { cea && <AddCEA patient={patient} closeModal={closeModal} /> }
            { ckmb && <AddCKMB patient={patient} closeModal={closeModal} /> }
            { crp && <AddCRP patient={patient} closeModal={closeModal} /> }
            { malb && <AddMAlb patient={patient} closeModal={closeModal} /> }
            { serumHCG     && <AddSerumHCG     patient={patient} closeModal={closeModal} /> }
            { crpUltraSensitive  && <AddCRPUltraSensitive  patient={patient} closeModal={closeModal} /> }
            <table>
                <tbody>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSerumHCG(true)}
                                variant="outlined">
                                B-HCG serum
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCA125(true)}
                                variant="outlined">
                                CA 12.5
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCA153(true)}
                                variant="outlined">
                                CA 15.3
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCEA(true)}
                                variant="outlined">
                                CEA
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCKMB(true)}
                                variant="outlined">
                                CKMB
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCRP(true)}
                                variant="outlined">
                                CRP
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCRPUltraSensitive(true)}
                                variant="outlined">
                                CRP UltraSensitive
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setMAlb(true)}
                                variant="outlined">
                                M-Alb
                            </Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </>
    )
}

export default TumourMarkersTab;
