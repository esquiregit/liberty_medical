import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import EditISE from '../Labs/Chemistry/EditISE';
import EditLFT from '../Labs/Chemistry/EditLFT';
import EditHBA1C from '../Labs/Chemistry/EditHBA1C';
import EditUrine from '../Labs/Chemistry/EditUrine';
import EditBueLFT from '../Labs/Chemistry/EditBueLft';
import EditSC3SC4 from '../Labs/Chemistry/EditSC3SC4';
import EditUrineACR from '../Labs/Chemistry/EditUrineACR';
import EditBueLipids from '../Labs/Chemistry/EditBueLipids';
import EditFolateB12 from '../Labs/Chemistry/EditFolateB12';
import EditIronStudy from '../Labs/Chemistry/EditIronStudy';
import EditBloodSugar from '../Labs/Chemistry/EditBloodSugar';
import EditCSFBiochem from '../Labs/Chemistry/EditCSFBiochem';
import EditSerumLipase from '../Labs/Chemistry/EditSerumLipase';
import EditLipidProfile from '../Labs/Chemistry/EditLipidProfile';
import EditBueCreatinine from '../Labs/Chemistry/EditBueCreatinine';
import EditCardiacEnzyme from '../Labs/Chemistry/EditCardiacEnzyme';
import EditCalciumProfile from '../Labs/Chemistry/EditCalciumProfile';
import EditGeneralChemistry from '../Labs/Chemistry/EditGeneralChemistry';
import EditCReactiveProtein from '../Labs/Chemistry/EditCReactiveProtein';
import EditCompactChemistry from '../Labs/Chemistry/EditCompactChemistry';
import EditBueCreatinineEgfr from '../Labs/Chemistry/EditBueCreatinineEgfr';
import EditHypersensitiveCPR from '../Labs/Chemistry/EditHypersensitiveCPR';
import EditProteinElectrophoresis from '../Labs/Chemistry/EditProteinElectrophoresis';

const ChemistryTab = ({ lab }) => {
    const [bueCreatinine, setBueCreatinine] = useState(false);
    const [bueCreatinineEgfr, setBueCreatinineEgfr] = useState(false);
    const [bueLFT, setBueLFT] = useState(false);
    const [bueLipids, setBueLipids] = useState(false);
    const [bloodSugar, setBloodSugar] = useState(false);
    const [cReactiveProtein, setCReactiveProtein] = useState(false);
    const [csfBiochem, setCSFBiochem] = useState(false);
    const [calciumProfile, setCalciumProfile]   = useState(false);
    const [cardiacEnzyme, setCardiacEnzyme] = useState(false);
    const [compactChemistry, setCompactChemistry] = useState(false);
    const [folateB12, setFolateB12] = useState(false);
    const [generalChemistry, setGeneralChemistry] = useState(false);
    const [hba1c, setHBA1C] = useState(false);
    const [hypersensitiveCPR, setHypersensitiveCPR] = useState(false);
    const [ise, setISE] = useState(false);
    const [ironStudy, setIronStudy] = useState(false);
    const [lft, setLFT] = useState(false);
    const [lipidProfile, setLipidProfile] = useState(false);
    const [proteinElectrophoresis, setProteinElectrophoresis] = useState(false);
    const [sc3sc4, setSC3SC4] = useState(false);
    const [serumLipase, setSerumLipase] = useState(false);
    const [urine, setUrine] = useState(false);
    const [urineACR, setUrineACR] = useState(false);

    const closeModal = modal => {
        if(modal.toLowerCase() === 'buecreatinine') {
            setBueCreatinine(false);
        } else if(modal.toLowerCase() === 'buecreatinineegfr') {
            setBueCreatinineEgfr(false);
        } else if(modal.toLowerCase() === 'buelft') {
            setBueLFT(false);
        } else if(modal.toLowerCase() === 'buelipids') {
            setBueLipids(false);
        } else if(modal.toLowerCase() === 'bloodsugar') {
            setBloodSugar(false);
        } else if(modal.toLowerCase() === 'creactiveprotein') {
            setCReactiveProtein(false);
        } else if(modal.toLowerCase() === 'csfbiochem') {
            setCSFBiochem(false);
        } else if(modal.toLowerCase() === 'calciumprofile') {
            setCalciumProfile(false);
        } else if(modal.toLowerCase() === 'cardiacenzyme') {
            setCardiacEnzyme(false);
        } else if(modal.toLowerCase() === 'compactchemistry') {
            setCompactChemistry(false);
        } else if(modal.toLowerCase() === 'folateb12') {
            setFolateB12(false);
        } else if(modal.toLowerCase() === 'generalchemistry') {
            setGeneralChemistry(false);
        } else if(modal.toLowerCase() === 'hba1c') {
            setHBA1C(false);
        } else if(modal.toLowerCase() === 'hypersensitivecpr') {
            setHypersensitiveCPR(false);
        } else if(modal.toLowerCase() === 'ise') {
            setISE(false);
        } else if(modal.toLowerCase() === 'ironstudy') {
            setIronStudy(false);
        } else if(modal.toLowerCase() === 'lft') {
            setLFT(false);
        } else if(modal.toLowerCase() === 'lipidprofile') {
            setLipidProfile(false);
        } else if(modal.toLowerCase() === 'proteinelectrophoresis') {
            setProteinElectrophoresis(false);
        } else if(modal.toLowerCase() === 'sc3sc4') {
            setSC3SC4(false);
        } else if(modal.toLowerCase() === 'serumlipase') {
            setSerumLipase(false);
        } else if(modal.toLowerCase() === 'urine') {
            setUrine(false);
        } else if(modal.toLowerCase() === 'urineacr') {
            setUrineACR(false);
        }
    };

    return (
        <>
            { bueLFT                 && <EditBueLFT lab={lab} closeModal={closeModal} /> }
            { bueLipids              && <EditBueLipids lab={lab} closeModal={closeModal} /> }
            { bloodSugar             && <EditBloodSugar lab={lab} closeModal={closeModal} /> }
            { csfBiochem             && <EditCSFBiochem lab={lab} closeModal={closeModal} /> }
            { bueCreatinine          && <EditBueCreatinine lab={lab} closeModal={closeModal} /> }
            { cardiacEnzyme          && <EditCardiacEnzyme lab={lab} closeModal={closeModal} /> }
            { calciumProfile         && <EditCalciumProfile  lab={lab} closeModal={closeModal} /> }
            { cReactiveProtein       && <EditCReactiveProtein lab={lab} closeModal={closeModal} /> }
            { bueCreatinineEgfr      && <EditBueCreatinineEgfr lab={lab} closeModal={closeModal} /> }
            { compactChemistry       && <EditCompactChemistry lab={lab} closeModal={closeModal} /> }
            { folateB12              && <EditFolateB12 lab={lab} closeModal={closeModal} /> }
            { generalChemistry       && <EditGeneralChemistry lab={lab} closeModal={closeModal} /> }
            { hba1c                  && <EditHBA1C lab={lab} closeModal={closeModal} /> }
            { hypersensitiveCPR      && <EditHypersensitiveCPR lab={lab} closeModal={closeModal} /> }
            { ise                    && <EditISE lab={lab} closeModal={closeModal} /> }
            { ironStudy              && <EditIronStudy lab={lab} closeModal={closeModal} /> }
            { lft                    && <EditLFT lab={lab} closeModal={closeModal} /> }
            { lipidProfile           && <EditLipidProfile lab={lab} closeModal={closeModal} /> }
            { proteinElectrophoresis && <EditProteinElectrophoresis lab={lab} closeModal={closeModal} /> }
            { sc3sc4                 && <EditSC3SC4 lab={lab} closeModal={closeModal} /> }
            { serumLipase            && <EditSerumLipase lab={lab} closeModal={closeModal} /> }
            { urine                  && <EditUrine lab={lab} closeModal={closeModal} /> }
            { urineACR               && <EditUrineACR lab={lab} closeModal={closeModal} /> }
            <table>
                <tbody>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBueCreatinine(true)}
                                variant="outlined">
                                BUE + creatinine
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBueCreatinineEgfr(true)}
                                variant="outlined">
                                BUE + creatinine + eGFR
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBueLFT(true)}
                                variant="outlined">
                                BUE + LFT
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBueLipids(true)}
                                variant="outlined">
                                BUE + lipids
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setBloodSugar(true)}
                                variant="outlined">
                                blood sugar
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCReactiveProtein(true)}
                                variant="outlined">
                                c reactive protein
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCSFBiochem(true)}
                                variant="outlined">
                                CSF biochem
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCalciumProfile(true)}
                                variant="outlined">
                                calcium profile
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCardiacEnzyme(true)}
                                variant="outlined">
                                cardiac enzyme
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setCompactChemistry(true)}
                                variant="outlined">
                                compact chemistry
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setFolateB12(true)}
                                variant="outlined">
                                folate b12
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setGeneralChemistry(true)}
                                variant="outlined">
                                general chemistry
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHBA1C(true)}
                                variant="outlined">
                                HBA1C
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setHypersensitiveCPR(true)}
                                variant="outlined">
                                hypersensitive CPR
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setISE(true)}
                                variant="outlined">
                                ISE
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setIronStudy(true)}
                                variant="outlined">
                                iron study
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setLFT(true)}
                                variant="outlined">
                                LFT
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setLipidProfile(true)}
                                variant="outlined">
                                lipid profile
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setProteinElectrophoresis(true)}
                                variant="outlined">
                                protein electrophoresis
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSC3SC4(true)}
                                variant="outlined">
                                SC3 SC4
                            </Button>
                        </td>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setSerumLipase(true)}
                                variant="outlined">
                                serum lipase
                            </Button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <Button
                                fullWidth
                                onClick={() => setUrine(true)}
                                variant="outlined">
                                urine
                            </Button>
                        </td>
                        <td colSpan="2">
                            <Button
                                fullWidth
                                onClick={() => setUrineACR(true)}
                                variant="outlined">
                                urine ACR
                            </Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </>
    )
}

export default ChemistryTab;
