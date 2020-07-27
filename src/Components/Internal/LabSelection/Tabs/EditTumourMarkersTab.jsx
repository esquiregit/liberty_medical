import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import EditCA125 from '../Labs/TumourMarkers/EditCA125';
import EditCA153 from '../Labs/TumourMarkers/EditCA153';
import EditCEA from '../Labs/TumourMarkers/EditCEA';
import EditCKMB from '../Labs/TumourMarkers/EditCKMB';
import EditCRP from '../Labs/TumourMarkers/EditCRP';
import EditMAlb from '../Labs/TumourMarkers/EditMAlb';
import EditSerumHCG from '../Labs/TumourMarkers/EditSerumHCG';
import EditCRPUltraSensitive from '../Labs/TumourMarkers/EditCRPUltraSensitive';

const TumourMarkersTab = ({ lab }) => {
    const [cea, setCEA]           = useState(false);
    const [crp, setCRP]           = useState(false);
    const [ckmb, setCKMB]         = useState(false);
    const [malb, setMAlb]         = useState(false);
    const [ca125, setCA125]       = useState(false);
    const [ca153, setCA153]       = useState(false);
    const [serumHCG, setSerumHCG] = useState(false);
    const [crpUltraSensitive, setCRPUltraSensitive] = useState(false);

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
            { cea               && <EditCEA               lab={lab} closeModal={closeModal} /> }
            { crp               && <EditCRP               lab={lab} closeModal={closeModal} /> }
            { ckmb              && <EditCKMB              lab={lab} closeModal={closeModal} /> }
            { malb              && <EditMAlb              lab={lab} closeModal={closeModal} /> }
            { ca125             && <EditCA125             lab={lab} closeModal={closeModal} /> }
            { ca153             && <EditCA153             lab={lab} closeModal={closeModal} /> }
            { serumHCG          && <EditSerumHCG          lab={lab} closeModal={closeModal} /> }
            { crpUltraSensitive && <EditCRPUltraSensitive lab={lab} closeModal={closeModal} /> }
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
