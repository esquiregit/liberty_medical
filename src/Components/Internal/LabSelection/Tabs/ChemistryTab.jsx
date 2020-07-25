import React, { useState } from 'react';
import Button from '@material-ui/core/Button';
import AddISE from '../Labs/Chemistry/AddISE';
import AddLFT from '../Labs/Chemistry/AddLFT';
import AddHBA1C from '../Labs/Chemistry/AddHBA1C';
import AddUrine from '../Labs/Chemistry/AddUrine';
import AddBueLFT from '../Labs/Chemistry/AddBueLFT';
import AddSC3SC4 from '../Labs/Chemistry/AddSC3SC4';
import AddUrineACR from '../Labs/Chemistry/AddUrineACR';
import AddBueLipids from '../Labs/Chemistry/AddBueLipids';
import AddFolateB12 from '../Labs/Chemistry/AddFolateB12';
import AddIronStudy from '../Labs/Chemistry/AddIronStudy';
import AddBloodSugar from '../Labs/Chemistry/AddBloodSugar';
import AddCSFBiochem from '../Labs/Chemistry/AddCSFBiochem';
import AddSerumLipase from '../Labs/Chemistry/AddSerumLipase';
import AddLipidProfile from '../Labs/Chemistry/AddLipidProfile';
import AddBueCreatinine from '../Labs/Chemistry/AddBueCreatinine';
import AddCardiacEnzyme from '../Labs/Chemistry/AddCardiacEnzyme';
import AddCalciumProfile from '../Labs/Chemistry/AddCalciumProfile';
import AddGeneralChemistry from '../Labs/Chemistry/AddGeneralChemistry';
import AddCReactiveProtein from '../Labs/Chemistry/AddCReactiveProtein';
import AddCompactChemistry from '../Labs/Chemistry/AddCompactChemistry';
import AddBueCreatinineEgfr from '../Labs/Chemistry/AddBueCreatinineEgfr';
import AddHypersensitiveCPR from '../Labs/Chemistry/AddHypersensitiveCPR';
import AddProteinElectrophoresis from '../Labs/Chemistry/AddProteinElectrophoresis';

const ChemistryTab = ({ patient }) => {
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
            { bueLFT                 && <AddBueLFT patient={patient} closeModal={closeModal} /> }
            { bueLipids              && <AddBueLipids patient={patient} closeModal={closeModal} /> }
            { bloodSugar             && <AddBloodSugar patient={patient} closeModal={closeModal} /> }
            { csfBiochem             && <AddCSFBiochem patient={patient} closeModal={closeModal} /> }
            { bueCreatinine          && <AddBueCreatinine patient={patient} closeModal={closeModal} /> }
            { cardiacEnzyme          && <AddCardiacEnzyme patient={patient} closeModal={closeModal} /> }
            { calciumProfile         && <AddCalciumProfile  patient={patient} closeModal={closeModal} /> }
            { cReactiveProtein       && <AddCReactiveProtein patient={patient} closeModal={closeModal} /> }
            { bueCreatinineEgfr      && <AddBueCreatinineEgfr patient={patient} closeModal={closeModal} /> }
            { compactChemistry       && <AddCompactChemistry patient={patient} closeModal={closeModal} /> }
            { folateB12              && <AddFolateB12 patient={patient} closeModal={closeModal} /> }
            { generalChemistry       && <AddGeneralChemistry patient={patient} closeModal={closeModal} /> }
            { hba1c                  && <AddHBA1C patient={patient} closeModal={closeModal} /> }
            { hypersensitiveCPR      && <AddHypersensitiveCPR patient={patient} closeModal={closeModal} /> }
            { ise                    && <AddISE patient={patient} closeModal={closeModal} /> }
            { ironStudy              && <AddIronStudy patient={patient} closeModal={closeModal} /> }
            { lft                    && <AddLFT patient={patient} closeModal={closeModal} /> }
            { lipidProfile           && <AddLipidProfile patient={patient} closeModal={closeModal} /> }
            { proteinElectrophoresis && <AddProteinElectrophoresis patient={patient} closeModal={closeModal} /> }
            { sc3sc4                 && <AddSC3SC4 patient={patient} closeModal={closeModal} /> }
            { serumLipase            && <AddSerumLipase patient={patient} closeModal={closeModal} /> }
            { urine                  && <AddUrine patient={patient} closeModal={closeModal} /> }
            { urineACR               && <AddUrineACR patient={patient} closeModal={closeModal} /> }
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
