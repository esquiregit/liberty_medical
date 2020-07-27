import React from 'react';
import Button from '@material-ui/core/Button';

const ImmunologyTab = ({ history }) => {
    return (
        <table>
            <tbody>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/antenatal-screening')}
                            variant="outlined">
                            antenatal screening
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/cd4-count')}
                            variant="outlined">
                            CD4 count
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/general-serology')}
                            variant="outlined">
                            general Serology
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/h-pylori-ag')}
                            variant="outlined">
                            h. pylori Ag.
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/h-pylori-ag-sob')}
                            variant="outlined">
                            h. pylori Ag. SOB
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/h-pylori-ag-blood')}
                            variant="outlined">
                            h. pylori Ag. Blood
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hbv-viral-load')}
                            variant="outlined">
                            HBV viral load
                        </Button>
                    </td>
                    <td>
                    <Button
                            fullWidth
                            onClick={() => history.push('/history/hiv-viral-load')}
                            variant="outlined">
                            HIV viral load
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hepatitis-b-profile')}
                            variant="outlined">
                            hepatitis B Profile
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/hepatitis-markers')}
                            variant="outlined">
                            hepatitis Markers
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/mantoux')}
                            variant="outlined">
                            mantoux
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/pregnancy-test')}
                            variant="outlined">
                            pregnancy Test
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/rheumatology')}
                            variant="outlined">
                            rheumatology
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/semen-analysis')}
                            variant="outlined">
                            semen analysis
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td colSpan="2">
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/widal')}
                            variant="outlined">
                            widal
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default ImmunologyTab;
